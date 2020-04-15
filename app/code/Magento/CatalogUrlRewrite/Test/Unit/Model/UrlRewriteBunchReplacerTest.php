<?php declare(strict_types=1);
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogUrlRewrite\Test\Unit\Model;

use Magento\CatalogUrlRewrite\Model\UrlRewriteBunchReplacer;
use Magento\UrlRewrite\Model\UrlPersistInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UrlRewriteBunchReplacerTest extends TestCase
{
    /**
     * @var UrlPersistInterface|MockObject
     */
    private $urlPersistMock;

    /**
     * @var UrlRewriteBunchReplacer
     */
    private $urlRewriteBunchReplacer;

    public function setUp(): void
    {
        $this->urlPersistMock = $this->createMock(UrlPersistInterface::class);
        $this->urlRewriteBunchReplacer = new UrlRewriteBunchReplacer(
            $this->urlPersistMock
        );
    }

    public function testDoBunchReplace()
    {
        $urls = [[1], [2]];
        $this->urlPersistMock->expects($this->exactly(2))
            ->method('replace')
            ->withConsecutive([[[1]]], [[[2]]]);
        $this->urlRewriteBunchReplacer->doBunchReplace($urls, 1);
    }
}
