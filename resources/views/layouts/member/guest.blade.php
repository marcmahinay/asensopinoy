<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title> Dashboard Profile Page Theme Color CSS Vanilla JS Example </title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
</head>

<body class="theme-orange">
    <main class="cd__main">
        <!-- Start DEMO HTML (Use the following code into your project)-->
        <div class="profile-page">
            <div class="content">
                <div class="content__cover">
                    <img class="content__avatar"
                        src="{{ $member->image_url ? asset('storage/member/' . $member->image_url) : 'https://via.placeholder.com/128?text=No+Image' }}"
                        alt="image" />
                    <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>
                
                <div class="content__title">
                    <h1>{{ $member->lastname }}, {{ $member->firstname }} {{ $member->middlename }}</h1>
                    <span>{{ $member->barangay->name }}, {{ $member->barangay->municity->name }}</span>
                </div>
                <div class="content__description">
                    <p>Birthdate: {{ $member->birthdate }}</p>
                    <p>Sex: {{ $member->sex }}</p>
                    <p>Civil Status: {{ $member->civil_status }}</p>
                    <p>Blood Type:{{ $member->blood_type }}</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($member->ayudas as $ayuda)
                                <tr>
                                    <td>{{ $ayuda->pivot->date_availed }}</td>
                                    <td>{{ $ayuda->description }}</td>
                                    <td>{{ $ayuda->pivot->amount }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No ayuda availed!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="bg">
                <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                </div>
            </div>
        </div>

        <!-- END EDMO HTML (Happy Coding!)-->
    </main>
    <!-- Script JS -->
    <script src="./js/script.js"></script>
    <!--$%analytics%$-->
</body>

</html>
