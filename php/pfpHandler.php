<?php
session_start();


?>

<script>

    document.querySelector("img").addEventListener("change", function(){
        const reader = new FileReader();

        reader.addEventListener("load", ()=>{
            console.log(reader.result);
        })

        reader.readAsDataURL(this.files[0])
    });

</script>

