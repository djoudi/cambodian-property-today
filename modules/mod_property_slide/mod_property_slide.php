<div>
    <div id="myGallery" style="height: 300px; " >
        <div class="imageElement">
                <h3>CPT Agent</h3>
                <p>Nice classic cambodian wooden house from different perspective</p>
                <a href="#" title="open image" class="open"></a>

                <img src="images/cambodia-classic-villa.jpg" class="full" />
                <img src="images/cambodia-classic-villa.jpg" class="thumbnail" />
        </div>
        <div class="imageElement">
                <h3>CPT Agent</h3>
                <p>List of most popular cambodia architecture</p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/cambodia-lanscape.jpg" class="full" />
                <img src="images/cambodia-lanscape.jpg" class="thumbnail" />
        </div>
        <div class="imageElement">
                <h3> CPT Agent</h3>
                <p>Front view of the Cambodian wooden house </p>
                <a href="#" title="open image" class="open"></a>
                <img src="images/cambodia-villa.jpg" class="full" />
                <img src="images/cambodia-villa.jpg" class="thumbnail" />
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
