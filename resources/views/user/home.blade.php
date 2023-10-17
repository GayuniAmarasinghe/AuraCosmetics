<!DOCTYPE html>
<html lang="en">

<head>
@include('user.css')
</head>

<body>
    <!-- Start Top Nav -->
    @include('user.navbar')
    <!-- Close Top Nav -->


    <!-- Header -->
    @include('user.header')
    <!-- Close Header -->

    <!-- body -->
    @include('user.body')
    <!-- End body -->

    <!-- Start Categories of The Month -->
    @include('user.category')
    <!-- End Categories of The Month -->

    <!-- Start Featured Product -->
    @include('user.product')
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
     @include('user.footer')
    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    @include('user.script')
    <!-- End Script -->
</body>

</html>