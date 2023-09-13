<script type="application/ld+json">
{
	"@context": "https://schema.org/",
	"@type": "JobPosting",
	"title": "<?= $block->title() ?>",
	"description": "<?= $block->description() ?>",
	"hiringOrganization" : {
		"@type": "Organization",
		"name": "SCHOKOLADENSEITE.net Visuelle Kommunikation GmbH",
		"sameAs": "https://schokoladenseite.net/",
		"logo": "https://schokoladenseite.net/assets/img/logo-web.svg"
	},
	"industry": "Onlineagentur",
	"employmentType":<?php foreach($block->employmentType()->split() as $key => $type): ?><?php if(count($block->employmentType()->split()) > 1): ?>["<?= $type ?>"<?php if (!($key === array_key_last($block->employmentType()->split()))): ?>,<?php endif ?>]<?php else: ?>"<?= $type ?>"<?php endif ?><?php endforeach ?>,
	"datePosted": "<?php if($page->datetoday()->toBool() === true): ?><?= date("Y-m-d") ?><?php else: ?><?= $block->datePosted() ?><?php endif ?>",
	"validThrough": "",
	"workHours": "<?php if($block->workHours()->isNotEmpty()): ?><?= $block->workHours() ?><?php else: ?>9:30-18:30<?php endif ?>",
	"jobLocation": {
		"@type": "Place",
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "Rentzelstr., 16",
			"addressLocality": "Hamburg",
			"postalCode": "20146",
			"addressCountry": "DE"
		}
	},
	<?php if($block->responsibilities()->isNotEmpty()): ?>"responsibilities": "<?= $block->responsibilities() ?>",<?php endif ?>
	<?php if($block->qualifications()->isNotEmpty()): ?>"qualifications": "<?= $block->qualifications() ?>",<?php endif ?>
	<?php if($block->experienceRequirements()->isNotEmpty()): ?>"experienceRequirements": "<?= $block->experienceRequirements() ?>",<?php endif ?>
	<?php if($block->skills()->isNotEmpty()): ?>"skills": "<?= $block->skills() ?>"<?php endif ?>
}
</script>