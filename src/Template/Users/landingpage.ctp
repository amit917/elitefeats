
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<?php echo  $this->Html->css("homepage15")?>
<?php echo  $this->Html->script("landing")?>
<section class="nav">
    <div class="content1">
 <a href="<?php echo $this->Url->build([
                "controller" => "Users",
                "action" => "login"]); ?>" class="btn" >Sign In</a>
 </div>
 </section>
       
<section class="showcase">
  
			<div class="video-container">
				<video src="http://dev.elitefeats.eu/my_app_name/admin_l_t_e/media/video.mp4" autoplay muted loop></video>
			</div>
			<div class="content">
			
			 <?php echo $this->Html->image('Logo.png');?>
			 	<h2>Achieve peak performance in your sports</h2>
			 <a href="#about" class="btn">Read More</a>
			</div>
		</section>
		
		<section id="about">
		  	
			<h1>What is Elite Feats</h1>
		
			<p>
			 Elite Feats is a structured, easy to use program that puts the power to perform in your hands.
			</p>
            <a href="https://www.elitefeats.eu/" class="btn">Learn More</a>
		</section>
		<section class ="tabs">
			<div class="container">
				<div id="tab-1" class="tab-item tab-border">
					<i class=" fas fa-tools fa-3x"></i>
					<p class="hide-sm">Access our Tools</p>
				</div>
				<div id="tab-2" class="tab-item">
					<i class="fas fa-swimmer fa-3x"></i>
					<p class="hide-sm">Access our Modules</p>
				</div>
				<div id="tab-3" class="tab-item">
					<i class="fas fa-address-book fa-3x"></i>
					<p class="hide-sm">Access free resources</p>
				</div>
			</div>
		</section>
			<section class="tab-content">
			<div class="container">
				<!-- Tab Content 1 -->
				<div id="tab-1-content" class="tab-content-item show">
					<div class="tab-1-content-inner">
						<div>
							<p class="text-lg">
							
							</p>
							
						</div>
					
					</div>
				</div>

				<!-- Tab Content 2 -->
				<div id="tab-2-content" class="tab-content-item">
					<div class="tab-2-content-top">
					
					</div>
					<div class="tab-2-content-bottom">
						<div>
							
							
						</div>
						<div>
							
						</div>
						<div>
							
						</div>
					</div>
				</div>

				<!-- Tab Content 3 -->
				<div id="tab-3-content" class="tab-content-item">
					<div class="text-center">
						
					</div>
				</div>
			</div>
		</section>

	
