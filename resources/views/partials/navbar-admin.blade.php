<nav class="navbar navbar-expand-lg bg-light">
    @if(auth()->user()->role === 'admin')
        <div class="container-fluid">
            <a class="navbar-brand" href="/">JRamedia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product">View Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactions">View All Transactions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account">View Accounts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
