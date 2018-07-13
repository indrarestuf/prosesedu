@if (Auth::user()->role == 'Murid') 
<div class="my-1 p-3 bg-white rounded shadow">
@if (!count($user->rate)) 
<form method="POST" action="{{route('murid.review', $user->username)}}">
@csrf
<div class="star-rating text-center new">
  <div class="rating"  name="point">
    <input type="radio" id="star5" name="point"  value="5" /><label for="star5" title="Outstanding">5 stars</label>
    <input type="radio" id="star4" name="point"  value="4" /><label for="star4" title="Very Good">4 stars</label>
    <input type="radio" id="star3" name="point"  value="3" /><label for="star3" title="Good">3 stars</label>
    <input type="radio" id="star2" name="point"  value="2" /><label for="star2" title="Poor">2 stars</label>
    <input type="radio" id="star1" name="point"  value="1" /><label for="star1" title="Very Poor">1 star</label>
  </div>
</div>
<div class="form-group">
<textarea id="review"  placeholder="review untuk tutor"  type="text" class="form-control" name="review" required rows="1"></textarea>
</div>
<button type="submit" class="btn btn-block btn-sm btn-info">
Kirim review
</button>
</form>

@else
<form method="POST" action="{{route('murid.updatereview', $user->username)}}">
@csrf
<div class="star-rating text-center update">
  <div class="rating" id="point"  name="point">
    <input type="radio" id="star5" name="point" value="5"  {{ $rate->point == 5 ? 'checked' : '' }} /><label for="star5" title="Outstanding">5 stars</label>
    <input type="radio" id="star4" name="point" value="4" {{ $rate->point == 4 ? 'checked' : '' }}    /><label for="star4" title="Very Good">4 stars</label>
    <input type="radio" id="star3" name="point" value="3" {{ $rate->point == 3 ? 'checked' : '' }}   /><label for="star3" title="Good">3 stars</label>
    <input type="radio" id="star2" name="point"  value="2" {{ $rate->point == 2 ? 'checked' : '' }}  /><label for="star2" title="Poor">2 stars</label>
    <input type="radio" id="star1" name="point" value="1" {{ $rate->point == 1 ? 'checked' : '' }}   /><label for="star1" title="Very Poor">1 star</label>
  </div>
</div>
<div class="form-group">
<textarea id="review"  placeholder="review untuk tutor"  type="text" class="form-control" name="review" required rows="1">{{$rate->review}}</textarea>
</div>
<button type="submit" class="btn btn-block btn-sm btn-info">
Ubah review
</button>
</form>
@endif
</div>
@endif