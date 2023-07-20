<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
        }

        .table {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
        }

        .table {
            margin-top: 2%;
            color: whitesmoke;
            overflow-x: auto;
        }

        .table td,
        .table th {
            white-space: nowrap;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table-hover tbody tr:hover td {
            color: green;
        }

        .add-category-form {
            width: 50%;
            margin: auto;
            margin-top: 30px;
        }

        .input_color {
            color: black;
            text-align: left;
            width: 70%;
            margin-right: 5%;
        }

        @media (max-width: 768px) {
            .table {
                width: 90%;
            }

            .add-category-form {
                width: 90%;
            }
            .input_color{
                margin-bottom: 5%;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{ url('/add_category') }}" method="POST" class="add-category-form">
                        @csrf
                        <input type="text" class="input_color" name="category" placeholder="Write category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->category_name }}</td>
                                <td>
                                    <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger"
                                        href="{{ url('delete_category', $item->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')

        <!-- End custom js for this page -->
</body>

</html>
