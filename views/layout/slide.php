<div id="slideshow">
   <div> 
      <img width="50%" src="<?php echo "media/upload/profile".'/'.$value['photo']; ?>" class="mr-3 img-thumbnail" alt="..." style ="border-radius: 50%;width: 150px;height:150px;overflow: hidden;margin-left: 60px;">
   </div>
  <div>
      <div class="col-12 ">
          <h2 class="card-title">Name: <?php  echo $value['firstname']?></h2>
          <p class="card-text"><strong>Phone: </strong> <?php  echo $value['phonenumber']?> </p>
          <p class="card-text"><strong>Age: </strong> <?php  echo $value['age']?>  </p>
          <p><strong>HOmetown: </strong>
          <span class="badge bg-primary"><?php  echo $value['hometown']?> </span> 
          </p>
        </div>
   </div> 
</div>
<style type="text/css">
  #slideshow {  
    overflow: hidden;
    margin: 100px 0px 0px 60px; 
    width: 300px; 
    height: 160px;
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
    border-radius: 10px;
}

#slideshow > div { 
  overflow: hidden;
</style>
<script type="text/javascript">
  $("#slideshow > div:gt(0)").hide();

  setInterval(function() { 
    $('#slideshow > div:first')
      .fadeOut(1000)
      .next()
      .fadeIn(1000)
      .end()
      .appendTo('#slideshow');
  },  3000);
</script>