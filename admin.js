function Messagenull(){
    var value = "<?php echo $null ?>";
    if (value === "1"){
      alert('<h3 style="color:red;">please fill out all</h3>');  
    }else{
       alert('<h3 style="color:green;">Product Added Sucessfully</h3>'); 
    }
}