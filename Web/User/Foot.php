</div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a>  Distributed By <a href="https://themewagon.com" target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../Assets/Templates/Main/vendor/jquery/jquery.min.js"></script>
  <script src="../Assets/Templates/Main/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="../Assets/Templates/Main/assets/js/isotope.min.js"></script>
  <script src="../Assets/Templates/Main/assets/js/owl-carousel.js"></script>
  <script src="../Assets/Templates/Main/assets/js/tabs.js"></script>
  <script src="../Assets/Templates/Main/assets/js/popup.js"></script>
  <script src="../Assets/Templates/Main/assets/js/custom.js"></script>

  <script>
    // Get the select element
    const nameDropdown = document.getElementById("nameDropdown");

    // Add an event listener to capture the selected option
    nameDropdown.addEventListener("change", function() {
        const selectedName = nameDropdown.value;
        if (selectedName !== "") {
            alert("Selected name: " + selectedName);
            // You can perform further actions here based on the selected name
        }
    });
</script>



  </body>

</html>
