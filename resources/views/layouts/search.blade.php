
<div id="search" class="ui search segment inverted vertical">
	<div class="ui container">
		<form method="GET" action="{{ url('home')}}" class="ui inverted form">
			<div class="ui two fields">
				<div class="ui field input icon">
					<i class="search icon"></i>
					<input name="query" placeholder="Cari berdasarkan nama atau kategori" type="text">
				</div>
				<div class="field">
					<select name="category[]" multiple="" class="ui fluid dropdown">
						<option value="">Pilih Kategori</option>
						<option value="1">Kerajinan</option>
						<option value="2">Makanan</option>
						<option value="3">Pakaian</option>
					</select>
				</div>
			</div>
			<div class="inline fields">
				<div class="field">
					<div class="ui radio checkbox">
						<input type="radio" name="type" checked="checked" value="ukm">
						<label>UKM</label>
					</div>
				</div>
				<div class="field">
					<div class="ui radio checkbox">
						<input type="radio" name="type" value="product">
						<label>Produk</label>
					</div>
				</div>
			</div>
			<button type="submit" class="ui submit inverted button">Cari</button>
		</form>
	</div>
</div>
