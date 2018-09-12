<div class="panel panel-bordered panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="icon wb-search"></i> {{Lang::get('post.list_category')}} </h3>
        <div class="panel-actions">
            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="category-info">
            {{--@foreach($dd_categorie_posts as $key=>$item)--}}
                <label class="check-container">
                    {{--{{$item->name}}--}}
                    abc
                    {{--{{ Form::checkbox('list_category[]', $item->id, false, array('class' => '')) }}--}}
                    {{ Form::checkbox('list_category[]', 1, false, array('class' => '')) }}
                    <span class="check-mark"></span>
                </label>
            {{--@endforeach--}}

        </div>
    </div>
</div>