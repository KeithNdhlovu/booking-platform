@extends('layouts.app')

@section('title', 'Showing User ' . $user->name)


@section('content')

  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">

              @if ($user->name)

                <div class="col-sm-5 col-xs-6 text-larger">
                  <strong>
                    {{ trans('usersmanagement.labelUserName') }}
                  </strong>
                </div>

                <div class="col-sm-7">
                  {{ $user->name }}
                </div>

                <div class="clearfix"></div>
                <div class="border-bottom"></div>

              @endif

              @if ($user->email)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ HTML::mailto($user->email, $user->email) }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

              @endif

              @if ($user->id_number)

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  ID Number
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $user->id_number }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

              @endif

              @if ($user->first_name)

                <div class="col-sm-5 col-xs-6 text-larger">
                  <strong>
                    {{ trans('usersmanagement.labelFirstName') }}
                  </strong>
                </div>

                <div class="col-sm-7">
                  {{ $user->first_name }}
                </div>

                <div class="clearfix"></div>
                <div class="border-bottom"></div>

              @endif

              @if ($user->last_name)

                <div class="col-sm-5 col-xs-6 text-larger">
                  <strong>
                    {{ trans('usersmanagement.labelLastName') }}
                  </strong>
                </div>

                <div class="col-sm-7">
                  {{ $user->last_name }}
                </div>

                <div class="clearfix"></div>
                <div class="border-bottom"></div>

              @endif

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelRole') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <span class="badge badge-{{$user->isAdministrator() ? 'primary' : 'warning' }}">{{ ($user->user_role == 1) ? "Admin" : "User"}}</span>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  {{ trans('usersmanagement.labelStatus') }}
                </strong>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

              @if ($user->created_at)

                <div class="col-sm-5 col-xs-6 text-larger">
                  <strong>
                    {{ trans('usersmanagement.labelCreatedAt') }}
                  </strong>
                </div>

                <div class="col-sm-7">
                  {{ $user->created_at }}
                </div>

                <div class="clearfix"></div>
                <div class="border-bottom"></div>

              @endif

              @if ($user->updated_at)

                <div class="col-sm-5 col-xs-6 text-larger">
                  <strong>
                    {{ trans('usersmanagement.labelUpdatedAt') }}
                  </strong>
                </div>

                <div class="col-sm-7">
                  {{ $user->updated_at }}
                </div>

                <div class="clearfix"></div>
                <div class="border-bottom"></div>

              @endif

            </div>

          </div>
      </div>
  </div>


@endsection