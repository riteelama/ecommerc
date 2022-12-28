</div>
       
       <footer class="bg-dark text-white text-center text-lg-start" style="margin-top: 40px">

       <!-- Copyright -->
       <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
           © <?php echo date('Y')?> Copyright:
           <a class="text-white" href="https://riteelama.com.np/">Ritee Lama</a>
       </div>
       <!-- Copyright -->
       </footer>
       <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="" crossorigin="anonymous"></script> -->
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
       <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script> -->
       <script src="http://localhost/ecommerce/assets/bootstrap.min.js"></script>
       <script src="http://localhost/ecommerce/assets/jquery-2.2.4.js"></script>
       
<script>
  jQuery(document).ready(function($){
    $(".total_price_final").val(parseFloat(localStorage.getItem("totalPrice")));
    // $("#prod_id").val(localStorage.getItem("prodIda"));
    $("#prod_id2").val(localStorage.getItem("prodIda"));
    // console.log($(".prod_id").val(parseFloat(localStorage.getItem("prodId"))));
  });
</script>
 </body>

</html>