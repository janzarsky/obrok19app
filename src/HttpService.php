<?php

namespace App;

use \GuzzleHttp\Client;


class HttpService {
	private $httpClient;

	public function __construct() {
		$this->httpClient = new Client([
			'base_uri' => 'https://registrace.obrok19.cz/api/program/',
		]);
	}

	public function getSectionsOnline(): array {
		$json = $this->httpClient->request('GET', 'sections');
		$sectionsArray = json_decode($json->getBody(), true);
		$output = [];
		foreach ($sectionsArray as $section) {
			$output[$section['id']] = $section;
		}

		return $output;
	}

	public function getSectionsLocal(): array {
		return [
			10 => [
				'title' => 'Putování',
				'id' => 10,
			],
			1 => [
				'title' => 'Služba',
				'id' => 1,
			],
			2 => [
				'title' => 'Vzlet',
				'id' => 2,
			],
			11 => [
				'title' => 'Pamětníci',
				'id' => 11,
			],
			3 => [
				'title' => 'Vapro',
				'subTitle' => '1. blok',
				'id' => 3,
			],
			4 => [
				'title' => 'Vapro',
				'subTitle' => '2. blok',
				'id' => 4,
			],
		];
	}

	public function getPrograms(): array {
		$json = $this->httpClient->request('GET');
		return json_decode($json->getBody(), true);
	}
}
