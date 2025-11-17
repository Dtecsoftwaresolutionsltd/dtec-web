@extends('admin.master_layout')
@section('title')
    <title>{{ __('Menu Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Menu Details') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Car') }} >> {{ __('Menu List') }} >> {{ __('View') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-form crancy-form--v2">

                                <!-- Menu Details Card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Menu Information') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">{{ __('Menu Name') }}:</label>
                                                    <p class="form-control-static">{{ $menu->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">{{ __('Location') }}:</label>
                                                    <p class="form-control-static">
                                                        <span
                                                            class="badge bg-info text-white">{{ ucfirst($menu->location) }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">{{ __('Status') }}:</label>
                                                    <p class="form-control-static">
                                                        @if ($menu->is_active)
                                                            <span
                                                                class="badge bg-success text-white">{{ __('Active') }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger text-white">{{ __('Inactive') }}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">{{ __('Sort Order') }}:</label>
                                                    <p class="form-control-static">{{ $menu->sort_order }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($menu->translations->count() > 0)
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">{{ __('Translations') }}:</label>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ __('Language') }}</th>
                                                                        <th>{{ __('Name') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($menu->translations as $translation)
                                                                        <tr>
                                                                            <td>{{ strtoupper($translation->locale) }}</td>
                                                                            <td>{{ $translation->name }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Menu Items Card -->
                                <div class="card mt-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">{{ __('Menu Items') }}</h4>
                                        <a href="{{ route('admin.menus.menu-items.index', $menu) }}" class="crancy-btn">
                                            <i class="fas fa-list"></i> {{ __('Manage Items') }}
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        @if ($menu->menuItems->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Title') }}</th>
                                                            <th>{{ __('URL') }}</th>
                                                            <th>{{ __('Parent') }}</th>
                                                            <th>{{ __('Status') }}</th>
                                                            <th>{{ __('Sort Order') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($menu->menuItems->where('parent_id', null) as $item)
                                                            <tr>
                                                                <td>{{ $item->title }}</td>
                                                                <td>{{ $item->url }}</td>
                                                                <td>-</td>
                                                                <td>
                                                                    @if ($item->is_active)
                                                                        <span
                                                                            class="badge bg-success text-white">{{ __('Active') }}</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-danger text-white">{{ __('Inactive') }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->sort_order }}</td>
                                                            </tr>
                                                            @foreach ($item->children as $child)
                                                                <tr>
                                                                    <td class="pl-30">↳ {{ $child->title }}</td>
                                                                    <td>{{ $child->url }}</td>
                                                                    <td>{{ $item->title }}</td>
                                                                    <td>
                                                                        @if ($child->is_active)
                                                                            <span
                                                                                class="badge bg-success text-white">{{ __('Active') }}</span>
                                                                        @else
                                                                            <span
                                                                                class="badge bg-danger text-white">{{ __('Inactive') }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $child->sort_order }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <p class="text-center text-muted">{{ __('No menu items found') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="crancy-form__single">
                                    <div class="crancy-form__btn">
                                        <a href="{{ route('admin.menus.edit', $menu) }}" class="crancy-btn">
                                            <i class="fas fa-edit"></i> {{ __('Edit Menu') }}
                                        </a>
                                        <a href="{{ route('admin.menus.index') }}"
                                            class="crancy-btn crancy-btn--secondary">
                                            {{ __('Back to List') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection
