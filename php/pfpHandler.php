<?php
session_start();


?>

<script>

    document.querySelector("img").addEventListener("change", function(){
        const reader = new FileReader();

        reader.addEventListener("load", ()=>{
            localStorage.setItem("<?php echo $_SESSION['Id']?>", reader.result);
        })

        reader.readAsDataURL(this.files[0])
    });

    document.addEventListener("DOMContentLoaded", () =>{
        const pfpDataURL = localStorage.getItem("<?php echo $_SESSION['Id']?>");

        if(pfpDataURL){
            document.querySelector("pfp").setAttribute("src",pfpDataURL);
        }
    });
</script>

