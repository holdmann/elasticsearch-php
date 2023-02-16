<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch;

use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Elasticsearch\Traits\ClientEndpointsTrait;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Elastic\Elasticsearch\Traits\NamespaceTrait;
use Elastic\Elasticsearch\Transport\AsyncOnSuccess;
use Elastic\Elasticsearch\Transport\AsyncOnSuccessNoException;
use Elastic\Transport\Transport;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

final class Client implements ClientInterface
{
    const CLIENT_NAME = 'es';
    const VERSION = '8.6.1';
    const API_COMPATIBILITY_HEADER = '%s/vnd.elasticsearch+%s; compatible-with=8';
    
    use ClientEndpointsTrait;
    use EndpointTrait;
    use NamespaceTrait;
    
    /**
     * @var \Elastic\Transport\Transport
     */
    protected $transport;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Specify is the request is asyncronous
     * @var bool
     */
    protected $async = false;
    
    /**
     * Enable or disable the x-elastic-meta-header
     * @var bool
     */
    protected $elasticMetaHeader = true;

    /**
     * Enable or disable the response Exception
     * @var bool
     */
    protected $responseException = true;

    /**
     * The endpoint namespace storage
     * @var mixed[] 
     */
    protected $namespace;

    public function __construct(
        Transport $transport, 
        LoggerInterface $logger
    ) {
        $this->transport = $transport;
        $this->logger = $logger;       
        
        $this->defaultTransportSettings($this->transport);
    }

    /**
     * @inheritdoc
     */
    public function getTransport(): Transport
    {
        return $this->transport;
    }

    /**
     * @inheritdoc
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Set the default settings for Elasticsearch
     */
    protected function defaultTransportSettings(Transport $transport): void
    {
        $transport->setUserAgent('elasticsearch-php', self::VERSION);
    }

    /**
     * @inheritdoc
     * @return $this
     */
    public function setAsync(bool $async): \Elastic\Elasticsearch\ClientInterface
    {
        $this->async = $async;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAsync(): bool
    {
        return $this->async;
    }

    /**
     * @inheritdoc
     * @return $this
     */
    public function setElasticMetaHeader(bool $active): \Elastic\Elasticsearch\ClientInterface
    {
        $this->elasticMetaHeader = $active;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getElasticMetaHeader(): bool
    {
        return $this->elasticMetaHeader;
    }

    /**
     * @inheritdoc
     * @return $this
     */
    public function setResponseException(bool $active): \Elastic\Elasticsearch\ClientInterface
    {
        $this->responseException = $active;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getResponseException(): bool
    {
        return $this->responseException;
    }

    /**
     * @inheritdoc
     */
    public function sendRequest(RequestInterface $request)
    {   
        // If async returns a Promise
        if ($this->getAsync()) {
            if ($this->getElasticMetaHeader()) {
                $this->transport->setElasticMetaHeader(Client::CLIENT_NAME, Client::VERSION, true);
            }
            $this->transport->setAsyncOnSuccess(
                $request->getMethod() === 'HEAD'
                    ? new AsyncOnSuccessNoException
                    : ($this->getResponseException() ? new AsyncOnSuccess : new AsyncOnSuccessNoException)
            );
            return $this->transport->sendAsyncRequest($request);
        }     

        if ($this->getElasticMetaHeader()) {
            $this->transport->setElasticMetaHeader(Client::CLIENT_NAME, Client::VERSION, false);
        }
        $start = microtime(true);
        $response = $this->transport->sendRequest($request);
        $this->logger->info(sprintf("Response time in %.3f sec", microtime(true) - $start));       

        $result = new Elasticsearch;
        $result->setResponse($response, $request->getMethod() === 'HEAD' ? false : $this->getResponseException());
        return $result;
    }
}