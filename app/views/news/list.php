<h1>Danh Sách Tin Tức</h1>
{{$news_title}}
<br />
{{$news_content}}
<br />
{{toSlug('Tiêu Đề')}}
<br />
{{md5('123456')}}
<br/>
{!$news_author!}
<br />
@if(!empty($news_author))
<p>Tên Tác Giả: {{$news_author}}</p>
@else
<p>EMPTY</p>
@endif
@if(md5('123456')!='')
<p>MD5 : {{md5('123456')}}</p>
@endif
@php 
$number = 12345;
$number++;
echo $number;
$total = $number + 100;
$data = [
    'Item 1',
    'Item 2',
    'Item 3'
];
@endphp
<br/>
{{$total}}
<br/>
@for ($i = 0; $i < count($data); $i++)
<p>{{$data[$i]}}</p>
@endfor

@php
$i = 0;
@endphp
@while($i <=10)
<p>{{$i}}</p>
@php
$i++;
@endphp
@endwhile

@foreach ($data as $key => $value)
<p>Key = {{$key}} -- Value = {{$value}}</p>
@endforeach