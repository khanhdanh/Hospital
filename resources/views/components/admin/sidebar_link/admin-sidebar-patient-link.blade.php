<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
            Patient Section
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('patient.add') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Patient</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('patient.view') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Patient</p>
            </a>
        </li>
    </ul>
</li>
