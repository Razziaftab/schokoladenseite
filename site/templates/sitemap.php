<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<head>
		<title>Sitemap | SCHOKOLADENSEITE.net</title>
	</head>

	<!-- BODY -->
	<body>

		<!-- MAIN -->
		<main>
			<ul>	
				<li>
					<a href="/">Startseite</a>
				</li>
				<?php foreach ($site->mainnav()->toStructure() as $item): ?>
					<?php $mainMenuItem = $item->mainMenu()->toPage() ?>
					<?php $subMenuItem = $item->subMenu()->toPages() ?>
				
					<?php if ($item->subMenu()->isNotEmpty() || $item->hasSubmenu()->toBool() === true): ?> 
						<li>
							<a href="<?= $mainMenuItem->url() ?>" tabindex="0"><?= $mainMenuItem->title()->html() ?></a>
												
							<?php if ($item->hasSubmenu()->toBool() === true): ?> 								
								<ul>
									<?php foreach ($site->subnav()->toStructure() as $child): ?>
										<?php $subMenuItem = $child->mainMenu()->toPage() ?>
										<?php $subsubMenuItem = $child->subMenu()->toPages() ?>
									
										<li>
											<a href="<?= $subMenuItem->url() ?>" tabindex="0"><?= $subMenuItem->title()->html() ?></a>
											<ul>
												<?php foreach ($subsubMenuItem as $grandchild): ?>
													<li>
														<a href="<?= $grandchild->url() ?>" tabindex="0"><?= $grandchild->title()->html() ?></a>
													</li>
												<?php endforeach ?>
											</ul>
										</li>
									<?php endforeach ?>
								</ul>
							<?php else: ?>							
								<ul>
								   <?php foreach ($subMenuItem as $child): ?>
										<li>										
											<a href="<?= $child->url() ?>" tabindex="0"><?= $child->title()->html() ?></a>
										</li>
									<?php endforeach ?>
								</ul>
							<?php endif ?>
						</li>
					<?php else: ?>
						<li>
							<a href="<?= $mainMenuItem->url() ?>" tabindex="0"><?= $mainMenuItem->title()->html() ?></a>

							<?php if($mainMenuItem->id() == 'blog'): ?>
								<ul>
									<?php foreach($mainMenuItem->children()->listed() as $page): ?>
										<li>
											<a href="<?= $page->url() ?>" tabindex="0"><?= $page->title()->html() ?></a>
										</li>
									<?php endforeach ?>
								</ul>
							<?php endif ?>	
							
						</li>
					<?php endif ?>
					
					</li>	
				<?php endforeach ?>
			</ul>
		</main>
		
	</body>
	
</html>