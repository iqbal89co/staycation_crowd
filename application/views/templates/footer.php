<!-- footer -->
<footer class="footer">

	<div class="footer-left">

		<p class="footer-links">
			<a href="#">Home</a> ·
			<a href="#">About</a> ·
			<a href="#">Pricing</a> ·
			<a href="#">About</a> ·
			<a href="#">Faq</a> ·
			<a href="#">Contact</a>
		</p>

		<p class="footer-company-name text-light">Babymoon &copy; 2021</p>
	</div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>

<script>
	$(document).ready(function() {
		$('.carousel').carousel();
		$('.convertCity').each(function() {
			let t = $(this);
			let field = $(this).data('id');
			$.ajax({
				type: "POST",
				url: "<?= base_url('hero/getCity') ?>",
				dataType: "json",
				data: {
					city_id: field
				},
				success: function(result) {
					$(t).text(result);
				}
			})
		})
		$(document).on('click', '.btnMin', function() {
			let minNumber = Number($(this).next().text());
			if (minNumber > 0) {
				minNumber--;
			}
			$(this).next().text(minNumber);

			let getParent = $(this).parent().attr('id');
			if (getParent == 'rowIbuHamil') {
				let addVal = Number($('.ctIbuHamil').val());
				if (addVal > 0) {
					addVal--;
				}
				$('.ctIbuHamil').val(addVal);
			} else if (getParent == 'rowDewasa') {
				let addVal = Number($('.ctDewasa').val());
				if (addVal > 0) {
					addVal--;
				}
				$('.ctDewasa').val(addVal);
			} else if (getParent == 'rowAnak') {
				let addVal = Number($('.ctAnak').val());
				if (addVal > 0) {
					addVal--;
				}
				$('.ctAnak').val(addVal);
			}
		});
		$(document).on('click', '.btnPlus', function() {
			let plusNumber = Number($(this).prev().text()) + 1;
			$(this).prev().text(plusNumber);

			let getParent = $(this).parent().attr('id');
			if (getParent == 'rowIbuHamil') {
				let addVal = Number($('.ctIbuHamil').val()) + 1;
				$('.ctIbuHamil').val(addVal);
			} else if (getParent == 'rowDewasa') {
				let addVal = Number($('.ctDewasa').val()) + 1;
				$('.ctDewasa').val(addVal);
			} else if (getParent == 'rowAnak') {
				let addVal = Number($('.ctAnak').val()) + 1;
				$('.ctAnak').val(addVal);
			}
		});
		$(document).on('click', '.drop-heading, .drop-done', function() {
			$('.drop-text').toggle();
		})
	})
</script>
</body>

</html>
