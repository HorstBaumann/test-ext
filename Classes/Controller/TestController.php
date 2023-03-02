<?php

declare(strict_types=1);

namespace Fk\Test\Controller;


/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 
 */

/**
 * TestController
 */
class TestController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * testRepository
     *
     * @var \Fk\Test\Domain\Repository\TestRepository
     */
    protected $testRepository = null;

    /**
     * @param \Fk\Test\Domain\Repository\TestRepository $testRepository
     */
    public function injectTestRepository(\Fk\Test\Domain\Repository\TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $tests = $this->testRepository->findAll();
        $this->view->assign('tests', $tests);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Fk\Test\Domain\Model\Test $test
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Fk\Test\Domain\Model\Test $test): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('test', $test);
        return $this->htmlResponse();
    }
}
