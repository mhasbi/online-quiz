<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!"></a></li>
  <li><a href="#!">Profile</a></li>
  <li class="divider"></li>
  <li><a href="#!">logout</a></li>
</ul>
<nav class="red lighten-2" role="navigation">
  <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo">Online Quiz</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{url('/quiz-list')}}">Quiz List</a></li>
      <li><a href="#">Your Result</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1"> <i class="medium material-icons">perm_identity</i></a></li>
    </ul>
    <ul id="nav-mobile" class="side-nav">
      <li><a href="{{ url('cards') }}">Home</a></li>
      <li><a href="#!">Quiz List</a></li>
      <li><a href="#!">Your Result</a></li>
      <!-- Dropdown Trigger -->
      <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Dropdown</a>
          <div class="collapsible-body">
            <ul class="grey lighten-3">
              <li>John Doe</li>
              <li><a href="#!">Profile</a></li>
              <li class="divider"></li>
              <li><a href="#!">Logout</a></li>
            </ul>
          </div>
        </li>
      </ul>
      </li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav>
