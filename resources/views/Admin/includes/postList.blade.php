<table class="table table-striped admin-users-table">
    <thead>
       <tr>
           <th>#</th>
           <th>Photo</th>
           <th>Name</th>
           <th>Genra</th>
           <th>Onwer</th>
           <th>Created</th>
           <th>Updated</th>
       </tr>
    </thead>
    <tbody>
 @if($posts)
@foreach ($posts as $post)
<tr>
<td>{{$post->id}}</td> 
 <td><img src="{{ url('/images/posts/'.$post->photo['filename'])}}"  width="50px" alt=""></td>
 <td>
 <a href="{{ url('/admin/posts/'.$post->id.'/edit')}}"> {{$post->name}}  </a>
 </td>
<td>{{$post->category->name}}</td>
<td>{{$post->user->name}}</td>


<td>{{$post->created_at->diffForHumans() }}</td>
<td>{{$post->updated_at->diffForHumans() }}</td> 
</tr>    
@endforeach 

@endif

    </tbody>
</table>
