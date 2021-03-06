<?php

/**
 * Class DistributionSapphireRender
 */
final class DistributionSapphireRender {

	/**
	 * @var IDistribution
	 */
	private $distribution;

	public function __construct(IDistribution $distribution){
		$this->distribution = $distribution;
	}

	public function draw(){
		Requirements::javascript("marketplace/code/ui/frontend/js/openstack.implementation.capabilities.js");
        Requirements::javascript("marketplace/code/ui/frontend/js/marketplace.common.js");
		Requirements::javascript("marketplace/code/ui/frontend/js/implementation.page.js");
		Requirements::css("marketplace/code/ui/frontend/css/marketplace.css");
		return Controller::curr()->Customise($this->distribution )->renderWith(array('DistributionsDirectoryPage_implementation', 'DistributionsDirectoryPage', 'MarketPlacePage'));
	}

    public function pdf(){
        return Controller::curr()->Customise($this->distribution )->renderWith(array('DistributionsDirectoryPage_pdf'));
    }
} 