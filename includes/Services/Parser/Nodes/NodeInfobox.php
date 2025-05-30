<?php

namespace PortableInfobox\Services\Parser\Nodes;

class NodeInfobox extends Node {

	protected $params;

	public function getData() {
		if ( !isset( $this->data ) ) {
			$this->data = [ 'value' => $this->getDataForChildren() ];
		}

		return $this->data;
	}

	public function getRenderData() {
		return $this->getRenderDataForChildren();
	}

	public function isEmpty() {
		/** @var Node $child */
		foreach ( $this->getChildNodes() as $child ) {
			if ( !$child->isEmpty() ) {
				return false;
			}
		}

		return true;
	}

	public function getParams() {
		if ( !isset( $this->params ) ) {
			$result = [];
			foreach ( $this->xmlNode->attributes() as $k => $v ) {
				$result[$k] = (string)$v;
			}
			$this->params = $result;
		}

		return $this->params;
	}

	public function getSources() {
		return $this->getSourcesForChildren();
	}

	public function getMetadata() {
		return $this->getMetadataForChildren();
	}
}
