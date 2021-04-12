<?php
   require'includes/header.php';
?>
	<style>
.containers
{
    width: 100%;
    margin: 0px auto;
    display: flex;
    flex-direction: row;
    justify-content: center;
    flex-wrap: wrap;
}
.containers .box
{
    position: relative;
    width: 300px;
    height: 300px;
    background: #64ab5e;
    margin: 10px;
    box-sizing: border-box;
    display: inline-block;
}
.containers .box .imgBox
{
    position: relative;
    overflow: hidden;
}
.containers .box .imgBox img
{
    max-width: 100%;
    max-height: 100%;
    transition: transform 2s;
    height:300px;

}
.containers .box:hover .imgBox img
{
    transform: scale(1.2);
}
.containers .box .details
{
    position: absolute;
    top: 10px;
    left: 10px;
    bottom: 10px;
    right: 10px;
    background: rgba(0,0,0,.2);
    transform: scaleY(0);
    transition: transform .5s;
}
.containers .box:hover .details
{
    transform: scaleY(1);
}
.containers .box .details .content
{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    padding: 15px;
    color: #fff;
}
.containers .box .details .content h1
{
    margin: 0;
    padding: 0;
    font-size: 20px;
    color: #c25929;
}
.containers .box .details .content p
{
    margin: 10px 0 0;
    padding: 0;
    color: white;
    font-weight: bolder;
}

@media screen and (max-width: 768px) {
    .containers {
        padding: 0;
    }
    .containers .box {
    margin: 0;
    }

    }
</style>

 <section>
     <div class="containers">
        <div class="box">
            <div class="imgBox">
                <img src="images/nursery.jpg">
            </div>
            <div class="details">
                <div class="content">
                    <p>Wangaris Nursery located in Limuru and has good trees</p>
                </div></div></div>
                <div class="box">
            <div class="imgBox">
                <img src="images/nursery1.jpg">
            </div>
            <div class="details">
                <div class="content">
                    <p>Mwikalis Nursery in Kitui for indeginous species </p>
                </div>
            </div>
        </div>
                <div class="box">
            <div class="imgBox">
                <img src="images/nursery2.jpg">
            </div>
            <div class="details">
                <div class="content">
                   <button>Hello</button>
                    <p>My Nursery in Maili kumi for exotic trees </p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBox">
                <img src="images/nursery3.jpg">
            </div>
            <div class="details">
                <div class="content">
                    
                    <p>This is the best Nursery</p>
                </div>
            </div>
        </div></div>
         <div class="containers">
        <div class="box">
            <div class="imgBox">
                <img src="images/nursery4.jpg">
            </div>
            <div class="details">
                <div class="content">
                    <p>Wangaris Nursery located in Limuru and has good trees</p>
                </div></div></div>
                <div class="box">
            <div class="imgBox">
                <img src="images/nursery1.jpg">
            </div>
            <div class="details">
                <div class="content">
                    <p>Mwikalis Nursery in Kitui for indeginous species </p>
                </div>
            </div>
        </div>
                <div class="box">
            <div class="imgBox">
                <img src="images/nursery2.jpg">
            </div>
            <div class="details">
                <div class="content">
                   
                    <p>My Nursery in Maili kumi for exotic trees </p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBox">
                <img src="images/nursery3.jpg">
            </div>
            <div class="details">
                <div class="content">
                    
                    <p>This is the best Nursery</p>
                </div>
            </div>
        </div></div>
    </section>


<?php
   require'includes/footer.php';
?>
