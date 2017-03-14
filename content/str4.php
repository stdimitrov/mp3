<h2>Проекти</h2>

<script>

    $("#slideshow > div:gt(0)").hide();

    setInterval(function () {
        $('#slideshow > div:first')
            .fadeOut(3000)
            .next()
            .fadeIn(3000)
            .end()
            .appendTo('#slideshow');
    }, 10000);

</script>
<div id="slideshow">
    <div class="slideshow_img">
        <img class="img" src="picture/project/d1.jpg" width="600" height="420"/>
    </div>
    <div class="slideshow_img">
        <img class="img" src="picture/project/d2.jpg" width="600" height="420"/>
    </div>
    <div class="slideshow_img">
        <img class="img" src="picture/project/d3.jpg" width="600" height="420"/>
    </div>
    <div class="slideshow_img">
        <img class="img" src="picture/project/d4.jpg" width="600" height="420"/>
    </div>
    <div class="slideshow_img">
        <img class="img" src="picture/project/d5.jpg" width="600" height="420"/>
    </div>
    <div class="slideshow_img">
        <img class="img" src="picture/project/d6.jpeg" width="600" height="420"/>
    </div>
    <div class="slideshow_img">
        <img class="img" src="picture/project/d7.jpg" width="600" height="420"/>
    </div>
    <div class="slideshow_img">
        <img class="img" src="picture/project/d8.jpg" width="600" height="420"/>
    </div>
</div>
