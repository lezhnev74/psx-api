<?php
/*
 * PSX is a open source PHP framework to develop RESTful APIs.
 * For the current version and informations visit <http://phpsx.org>
 *
 * Copyright 2010-2017 Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PSX\Api\Tests\Listing;

use PSX\Api\Resource;
use PSX\Api\ResourceCollection;

/**
 * ListingTestCase
 *
 * @author  Christoph Kappestein <christoph.kappestein@gmail.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @link    http://phpsx.org
 */
abstract class ListingTestCase extends \PHPUnit_Framework_TestCase
{
    public function testGetResourceIndex()
    {
        $listing   = $this->newListing();
        $resources = $listing->getResourceIndex();

        $this->assertEquals(1, count($resources));
        $this->assertInstanceOf(Resource::class, $resources[0]);

        $resources = $listing->getResourceIndex();

        $this->assertEquals(1, count($resources));
        $this->assertInstanceOf(Resource::class, $resources[0]);
    }

    public function testGetResource()
    {
        $listing  = $this->newListing();
        $resource = $listing->getResource('/foo');

        $this->assertInstanceOf(Resource::class, $resource);

        $resource = $listing->getResource('/foo');

        $this->assertInstanceOf(Resource::class, $resource);
    }

    public function testGetResourceCollection()
    {
        $listing    = $this->newListing();
        $collection = $listing->getResourceCollection();

        $this->assertInstanceOf(ResourceCollection::class, $collection);

        $this->assertEquals(1, $collection->count());
        $this->assertInstanceOf(Resource::class, $collection->get('/foo'));
    }

    /**
     * @return \PSX\Api\ListingInterface
     */
    abstract protected function newListing();
}
