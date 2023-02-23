
<form action="{{ route('get-offers-season',['user'=>'username','season'=>'season'])}}" method="GET"> 
 User <select name="username" id="username">
         @foreach ($users as $user)
                 <option value="{{$user->id}}">{{ $user->username }}</option>
           
         @endforeach
     </select>
    Season <select name="season" id="season">
         <option value="none">none</option>
         @foreach ($offers as $offer)
             @if ($offer->season != 'none')
                 <option value="{{$offer->season}}">{{$offer->season}}</option>
             @endif
           
         @endforeach
     </select>
    <input type="submit" value="Send">
 </form> 