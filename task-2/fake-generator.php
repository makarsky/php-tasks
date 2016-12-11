<?php
	// You can use 'Faker' instead (it has more options), but it will reduce speed significantly.
	mb_internal_encoding("UTF-8");

	$region = $argv[1]; // BY, RU, US
	$numberOfRecords = (int) $argv[2]; // 1 - 10kk
	$errors_per_record = $argv[3];
	$errors = $numberOfRecords * $errors_per_record; // Total errors

	$phones = file($region."/phone.txt");
	$sizeofPhones = sizeof($phones) - 1;
	$addresses = file($region."/address.txt");
	$sizeofAddresses = sizeof($addresses) - 1;

	$records = array(); // This array will contain all records.

	// This condition is required because russian and belorusian male and female last names have different endings unlike english ones.
	if ($region == "RU" || $region == "BY") {
		$femaleFirstNames = file($region."/femaleFirstName.txt");
		$sizeofFemaleFirstNames = sizeof($femaleFirstNames) - 1;
		$femaleLastNames = file($region."/femaleLastName.txt");
		$sizeofFemaleLastNames = sizeof($femaleLastNames) - 1;
		$maleFirstNames = file($region."/maleFirstName.txt");
		$sizeofMaleFirstNames = sizeof($maleFirstNames) - 1;
		$maleLastNames = file($region."/maleLastName.txt");
		$sizeofMaleLastNames = sizeof($maleLastNames) - 1;

		for ($i=0; $i < $numberOfRecords; $i++) {
			if ($i % 2 == 0) {
				$record = $maleFirstNames[rand(0, $sizeofMaleFirstNames)]." ".$maleLastNames[rand(0, $sizeofMaleLastNames)]."; ";
			}
			else {
				$record = $femaleFirstNames[rand(0, $sizeofFemaleFirstNames)]." ".$femaleLastNames[rand(0, $sizeofFemaleLastNames)]."; ";
			}
			$record = $record.$addresses[rand(0, $sizeofAddresses)]."; "
						.$phones[rand(0, $sizeofPhones)];
			$record = str_replace("\n", "", $record);
			$records[$i] = $record."\n";
		}

	} else if ($region == "US") {
		$firstNames = file($region."/firstName.txt");
		$sizeofFirstNames = sizeof($firstNames) - 1;
		$lastNames = file($region."/lastName.txt");
		$sizeofLastNames = sizeof($lastNames) - 1;

		for ($i=0; $i < $numberOfRecords; $i++) {
			$record = $firstNames[rand(0, $sizeofFirstNames)]." ".$lastNames[rand(0, $sizeofLastNames)]."; ".$addresses[rand(0, $sizeofAddresses)]."; ".$phones[rand(0, $sizeofPhones)];
			$record = str_replace("\n", "", $record);
			$records[$i] = $record."\n";
		}
	}
	
	// This cycle takes random records from an array and adds to them different errors.
	for ($i=0; $i < $errors; $i++) {
		$randomNumber = rand(0, count($records) - 1);
		$records[$randomNumber] = generateError($records[$randomNumber]); // assigning a random record
	}

	// Printing the array that contains records.
	foreach ($records as $value) {
		echo $value;
	}

	// This function generates different types of errors.
	function generateError($record) {
		$stringLength = iconv_strlen($record) - 4;
			switch (rand(0, 2)) {
			case 0:
				$record = mb_substr_replace($record, mb_substr($record, rand(0, $stringLength), 1), rand(0, $stringLength));
				break;
			case 1:
				$record = mb_substr_add($record, mb_substr($record, rand(0, $stringLength), 1), rand(0, $stringLength));
				break;
			case 2:
				$record = mb_substr_replace($record, "", rand(0, $stringLength));
				break;
			// You can add here the other types of errors.
		}
		
		return $record;
	}

	// This function replaces a character in a certain place.
	function mb_substr_replace($output, $replace, $target) {
		return mb_substr($output, 0, $target).$replace.mb_substr($output, $target+1);
	}

	// This function adds a character to a certain place.
	function mb_substr_add($output, $additionalChar, $target) {
		return mb_substr($output, 0, $target).$additionalChar.mb_substr($output, $target);
	}
?>