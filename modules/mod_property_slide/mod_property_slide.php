<div>
    <div id="myGallery" style="height: 300px; " >
        <div class="imageElement">
                <h3>Item 1 Title</h3>
                <p>Item 1 Description</p>
                <a href="#" title="open image" class="open"></a>

                <img src="images/1.jpg" class="full" />
                <img src="images/1-0.jpg" class="thumbnail" />
        </div>
        <div class="imageElement">
                <h3>Item 2 Title</h3>
                <p>Item 2 Description</p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/2.jpg" class="full" />
                <img src="images/2-0.jpg" class="thumbnail" />
        </div>
        <div class="imageElement">
                <h3>Item 3 Title</h3>
                <p>Item 3 Description</p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/3.jpg" class="full" />
                <img src="images/3-0.jpg" class="thumbnail" />

        </div>
        <div class="imageElement">
                <h3>Item 4 Title</h3>
                <p>Item 4 Description</p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/4.jpg" class="full" />
                <img src="images/4-0.jpg" class="thumbnail" />
        </div>
        <div class="imageElement">
                <h3>Item 4 Title</h3>
                <p>Item 4 Description</p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/5.jpg" class="full" />
                <img src="images/4-0.jpg" class="thumbnail" />
        </div>
        <div class="imageElement">
                <h3>Item 4 Title</h3>
                <p>Item 4 Description</p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/6.jpg" class="full" />
                <img src="images/4-0.jpg" class="thumbnail" />
        </div>
        <div class="imageElement">
                <h3>Item 4 Title</h3>
                <p>Item 4 Description</p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/7.jpg" class="full" />
                <img src="images/4-0.jpg" class="thumbnail" />
        </div>


    </div>
    <script type="text/javascript">
        function startGallery() {
            var myGallery = new gallery($('myGallery'), {
                    timed: true
            });
        }
        window.addEvent('domready', startGallery);
    </script>

</div>
