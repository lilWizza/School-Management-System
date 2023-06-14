<div class="footer">
			<footer><p>Copyright &copy; OUR PROJECT </p></footer>
</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 600).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 600).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>