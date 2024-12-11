<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    .main {
        width: 100%;
        min-height: 100vh;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .card {
        width: 100%;
        max-width: 400px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

    .icon-div {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }

    .icon-div a {
        color: #dc3545;
        font-size: 1.25rem;
        transition: color 0.3s ease;
    }

    .icon-div :nth-child(2) {
        color: green;
        font-size: 1.25rem;
        transition: color 0.3s ease;
    }

    .icon-div a:hover {
        color: #155724;
    }

    @media (max-width: 767px) {
        .card {
            max-width: 100%;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .card-text {
            font-size: 0.9rem;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3" href="#">Blogy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fs-5 px-3" aria-current="page" href="index.php">
                        <i class="bi bi-house-door-fill"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5 px-3" href="createBlog.php">
                        <i class="bi bi-pencil-fill"></i> Create Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5 px-3" href="profile.php">
                        <i class="bi bi-person-fill"></i> Profile
                    </a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light rounded-pill" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Add this to include Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">