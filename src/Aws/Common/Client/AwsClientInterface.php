<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Common\Client;

use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Waiter\WaiterFactoryInterface;
use Guzzle\Service\ClientInterface;

/**
 * Interface that all AWS clients implement
 */
interface AwsClientInterface extends ClientInterface
{
    /**
     * @var string Option key holding an exponential backoff plugin
     */
    const EXPONENTIAL_BACKOFF_OPTION = 'client.exponential_backoff';

    /**
     * Returns the AWS credentials associated with the client
     *
     * @return CredentialsInterface
     */
    function getCredentials();

    /**
     * Set the waiter factory to use with the client
     *
     * @param WaiterFactoryInterface $waiterFactory Factory used to create waiters
     *
     * @return self
     */
    function setWaiterFactory(WaiterFactoryInterface $waiterFactory);

    /**
     * Wait until a resource is available or an associated waiter returns true
     *
     * @param string $waiter  Name of the waiter in snake_case
     * @param mixed  $value   Value to pass to the waiter
     * @param array  $options Options to pass to the waiter
     *
     * @return self
     */
    function waitUntil($waiter, $value = null, array $options = array());
}