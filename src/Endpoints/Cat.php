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

declare(strict_types=1);

namespace Elastic\Elasticsearch\Endpoints;

use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Cat extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Shows information about currently configured aliases to indices including filter and routing infos.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-alias.html
	 *
	 * @param array{
	 *     name: list, //  A comma-separated list of alias names to return
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function aliases(array $params = [])
	{
		if (isset($params['name'])) {
			$url = "/_cat/aliases/{$params['name']}";
			$method = 'GET';
		} else {
			$url = "/_cat/aliases";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Provides a snapshot of how many shards are allocated to each data node and how much disk space they are using.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-allocation.html
	 *
	 * @param array{
	 *     node_id: list, //  A comma-separated list of node IDs or names to limit the returned information
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes: enum, // The unit in which to display byte values
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function allocation(array $params = [])
	{
		if (isset($params['node_id'])) {
			$url = "/_cat/allocation/{$params['node_id']}";
			$method = 'GET';
		} else {
			$url = "/_cat/allocation";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Provides quick access to the document count of the entire cluster, or individual indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-count.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names to limit the returned information
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function count(array $params = [])
	{
		if (isset($params['index'])) {
			$url = "/_cat/count/{$params['index']}";
			$method = 'GET';
		} else {
			$url = "/_cat/count";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Shows how much heap memory is currently being used by fielddata on every data node in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-fielddata.html
	 *
	 * @param array{
	 *     fields: list, //  A comma-separated list of fields to return the fielddata size
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes: enum, // The unit in which to display byte values
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 *     fields: list, // A comma-separated list of fields to return in the output
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function fielddata(array $params = [])
	{
		if (isset($params['fields'])) {
			$url = "/_cat/fielddata/{$params['fields']}";
			$method = 'GET';
		} else {
			$url = "/_cat/fielddata";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns a concise representation of the cluster health.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-health.html
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     ts: boolean, // Set to false to disable timestamping
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function health(array $params = [])
	{
		$url = "/_cat/health";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns help for the Cat APIs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat.html
	 *
	 * @param array{
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function help(array $params = [])
	{
		$url = "/_cat";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about indices: number of primaries and replicas, document counts, disk size, ...
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-indices.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names to limit the returned information
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes: enum, // The unit in which to display byte values
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     health: enum, // A health status ("green", "yellow", or "red" to filter only indices matching the specified health status
	 *     help: boolean, // Return help information
	 *     pri: boolean, // Set to true to return stats only for primary shards
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 *     include_unloaded_segments: boolean, // If set to true segment stats will include stats for segments that are not currently loaded into memory
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function indices(array $params = [])
	{
		if (isset($params['index'])) {
			$url = "/_cat/indices/{$params['index']}";
			$method = 'GET';
		} else {
			$url = "/_cat/indices";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about the master node.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-master.html
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function master(array $params = [])
	{
		$url = "/_cat/master";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets configuration and usage information about data frame analytics jobs.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/cat-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, //  The ID of the data frame analytics to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no configs. (This includes `_all` string or when no configs have been specified)
	 *     bytes: enum, // The unit in which to display byte values
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function mlDataFrameAnalytics(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_cat/ml/data_frame/analytics/{$params['id']}";
			$method = 'GET';
		} else {
			$url = "/_cat/ml/data_frame/analytics";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets configuration and usage information about datafeeds.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/cat-datafeeds.html
	 *
	 * @param array{
	 *     datafeed_id: string, //  The ID of the datafeeds stats to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function mlDatafeeds(array $params = [])
	{
		if (isset($params['datafeed_id'])) {
			$url = "/_cat/ml/datafeeds/{$params['datafeed_id']}";
			$method = 'GET';
		} else {
			$url = "/_cat/ml/datafeeds";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets configuration and usage information about anomaly detection jobs.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/cat-anomaly-detectors.html
	 *
	 * @param array{
	 *     job_id: string, //  The ID of the jobs stats to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 *     bytes: enum, // The unit in which to display byte values
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function mlJobs(array $params = [])
	{
		if (isset($params['job_id'])) {
			$url = "/_cat/ml/anomaly_detectors/{$params['job_id']}";
			$method = 'GET';
		} else {
			$url = "/_cat/ml/anomaly_detectors";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets configuration and usage information about inference trained models.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/cat-trained-model.html
	 *
	 * @param array{
	 *     model_id: string, //  The ID of the trained models stats to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified)
	 *     from: int, // skips a number of trained models
	 *     size: int, // specifies a max number of trained models to get
	 *     bytes: enum, // The unit in which to display byte values
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function mlTrainedModels(array $params = [])
	{
		if (isset($params['model_id'])) {
			$url = "/_cat/ml/trained_models/{$params['model_id']}";
			$method = 'GET';
		} else {
			$url = "/_cat/ml/trained_models";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about custom node attributes.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-nodeattrs.html
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function nodeattrs(array $params = [])
	{
		$url = "/_cat/nodeattrs";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns basic statistics about performance of cluster nodes.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-nodes.html
	 *
	 * @param array{
	 *     bytes: enum, // The unit in which to display byte values
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     full_id: boolean, // Return the full node ID instead of the shortened version (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 *     include_unloaded_segments: boolean, // If set to true segment stats will include stats for segments that are not currently loaded into memory
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function nodes(array $params = [])
	{
		$url = "/_cat/nodes";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns a concise representation of the cluster pending tasks.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-pending-tasks.html
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function pendingTasks(array $params = [])
	{
		$url = "/_cat/pending_tasks";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about installed plugins across nodes node.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-plugins.html
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     include_bootstrap: boolean, // Include bootstrap plugins in the response
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function plugins(array $params = [])
	{
		$url = "/_cat/plugins";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about index shard recoveries, both on-going completed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-recovery.html
	 *
	 * @param array{
	 *     index: list, //  Comma-separated list or wildcard expression of index names to limit the returned information
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     active_only: boolean, // If `true`, the response only includes ongoing shard recoveries
	 *     bytes: enum, // The unit in which to display byte values
	 *     detailed: boolean, // If `true`, the response includes detailed information about shard recoveries
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     index: list, // Comma-separated list or wildcard expression of index names to limit the returned information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function recovery(array $params = [])
	{
		if (isset($params['index'])) {
			$url = "/_cat/recovery/{$params['index']}";
			$method = 'GET';
		} else {
			$url = "/_cat/recovery";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about snapshot repositories registered in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-repositories.html
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     local: boolean, // Return local information, do not retrieve the state from master node
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function repositories(array $params = [])
	{
		$url = "/_cat/repositories";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Provides low-level information about the segments in the shards of an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-segments.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names to limit the returned information
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes: enum, // The unit in which to display byte values
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function segments(array $params = [])
	{
		if (isset($params['index'])) {
			$url = "/_cat/segments/{$params['index']}";
			$method = 'GET';
		} else {
			$url = "/_cat/segments";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Provides a detailed view of shard allocation on nodes.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-shards.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names to limit the returned information
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes: enum, // The unit in which to display byte values
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function shards(array $params = [])
	{
		if (isset($params['index'])) {
			$url = "/_cat/shards/{$params['index']}";
			$method = 'GET';
		} else {
			$url = "/_cat/shards";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns all snapshots in a specific repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-snapshots.html
	 *
	 * @param array{
	 *     repository: list, //  Name of repository from which to fetch the snapshot information
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     ignore_unavailable: boolean, // Set to true to ignore unavailable snapshots
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function snapshots(array $params = [])
	{
		if (isset($params['repository'])) {
			$url = "/_cat/snapshots/{$params['repository']}";
			$method = 'GET';
		} else {
			$url = "/_cat/snapshots";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about the tasks currently executing on one or more nodes in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     nodes: list, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     actions: list, // A comma-separated list of actions that should be returned. Leave empty to return all.
	 *     detailed: boolean, // Return detailed task information (default: false)
	 *     parent_task_id: string, // Return tasks with specified parent task id (node_id:task_number). Set to -1 to return all.
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function tasks(array $params = [])
	{
		$url = "/_cat/tasks";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns information about existing templates.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-templates.html
	 *
	 * @param array{
	 *     name: string, //  A pattern that returned template names must match
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function templates(array $params = [])
	{
		if (isset($params['name'])) {
			$url = "/_cat/templates/{$params['name']}";
			$method = 'GET';
		} else {
			$url = "/_cat/templates";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns cluster-wide thread pool statistics per node.
	 * By default the active, queue and rejected statistics are returned for all thread pools.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cat-thread-pool.html
	 *
	 * @param array{
	 *     thread_pool_patterns: list, //  A comma-separated list of regular-expressions to filter the thread pools in the output
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     time: enum, // The unit in which to display time values
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function threadPool(array $params = [])
	{
		if (isset($params['thread_pool_patterns'])) {
			$url = "/_cat/thread_pool/{$params['thread_pool_patterns']}";
			$method = 'GET';
		} else {
			$url = "/_cat/thread_pool";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets configuration and usage information about transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/cat-transforms.html
	 *
	 * @param array{
	 *     transform_id: string, //  The id of the transform for which to get stats. '_all' or '*' implies all transforms
	 *     from: int, // skips a number of transform configs, defaults to 0
	 *     size: int, // specifies a max number of transforms to get, defaults to 100
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     h: list, // Comma-separated list of column names to display
	 *     help: boolean, // Return help information
	 *     s: list, // Comma-separated list of column names or column aliases to sort by
	 *     time: enum, // The unit in which to display time values
	 *     v: boolean, // Verbose mode. Display column headers
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function transforms(array $params = [])
	{
		if (isset($params['transform_id'])) {
			$url = "/_cat/transforms/{$params['transform_id']}";
			$method = 'GET';
		} else {
			$url = "/_cat/transforms";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}