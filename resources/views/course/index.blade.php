@extends('templates.public.template')

@section('content')

<div id="content">
    <div class="container container-main">
        <div class="row-fluid">
            <div class=" col-sm-3 col-xs-12 sidebar">
                <h3 class="category-header">{{ trans('layout.top') }}</h3>
                <ul class="categories-list" data-role="tree-navigation">
                    @foreach ($arCat as $element)
                        @if(count($element->courses))
                            <li>
                                <a href="{{ route('course.view', $element['id']) }}">{{ $element['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9 col-xs-12">
                <h2 class="courses-heading courses-heading-intro">{{ trans('layout.listcourse') }}</h2>
                <div class="clear" data-role="infinite-scrolling-content">
                    @foreach ($arCourse->courses as $element)
                        @if(count($element->lessons))
                        <div class="course-box-wrapper col-xs-6 col-sm-4">
                            <div class="course-box ">
                                <div class="inner-wrap">
                                    <a href="{{ route('course.course', [$element->id, str_slug($element->name)]) }}" class="picture-wrapper">
                                        <img src="{{ asset(Storage::url($element->image)) }}" alt="{{ $element->name }}">
                                    </a>
                                    <div class="details-wrapper">
                                        <div class="clearfix"></div>
                                        <h3>
                                            <a href="{{ route('course.course', [$element['id'], str_slug($element->name)]) }}" class="inner" title="{{ $element['name'] }}">
                                                {{ $element->name }}
                                            </a>
                                        </h3>
                                        <div class="details">
                                            <div class="row-fluid stats col-xs-12">
                                                <span class="stat col-xs-12" title=" ">
                                                    {{ $arCourse->name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

