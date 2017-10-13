				<form action="include/addArticle.php" method="POST">
					<div class='row'>
						<div class='col-lg-12'>
							<input required type="text" name="title" pattern="^\w.{1,}$" placeholder="Tytul" title="Tytuł musi się składać conajmniej z dwóch znaków">
						</div>
					</div>
					<div class='row'>
						<div class='col-lg-12'>
							<textarea required name="art" rows="10" cols="100" placeholder="Miejsce na twoj artykul..." wrap="hard"></textarea>
						</div>
					</div>
					<div class='row'>
						<div class='col-lg-12'>
							<!--<input required type="text" name="lang" pattern="[A-Z]{1,1}[a-z]{1,1}" placeholder="Jezyk" title="Kodowanie jezyka skladajace sie z jednej duzej i jednej malej litery">-->
							<select name='lang'>
								<option value='Pl'>Pl</option>
								<option value='En'>En</option>
							</select>
							<button class="przycisk">wyslij</button><br>
						</div>
					</div>
				</form>