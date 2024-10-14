@extends('components.user-components.layout')

@push('assets')
    <link rel="stylesheet" href="/css/user-css/about.css">
@endpush
@section('content')
    <div class="page-content">
        <x-user-components.page-title>ABOUT</x-user-components.page-title>
        <div class="about">
            <div class="about-what">
                <h1 class="title">About eBarrio</h1>
                <p>eBarrio is a modern and innovative Barangay Management System
                    designed to streamline and simplify the management processes
                    of barangays. It empowers residents by providing an easy-to-use
                    platform where they can request documents, send complaints, and
                    stay informed about barangay activities
                </p>
            </div>
            <div class="about-purpose">
                <div class="about-residents">
                    <h1 class="title">Purpose of eBarrio</h1>
                    <p>eBarrio aims to enhance the accessibility and efficiency of
                        barangay services for both officials and residents. It is developed
                        to reduce manual paperwork, minimize delays, and promote transparent
                        governance.
                    </p>
                </div>
                <div class="about-general">
                    <div class="about-residents">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <div>
                                <h1 class="title">What Can eBarrio Do for You?</h1>
                                <h1>Residents</h1>
                                <ul>
                                    <li><span><strong>Request Documents Online</strong></span> Easily request barangay IDs,
                                        clearances, certificates, and other necessary documents without having to visit the
                                        barangay hall.</li>
                                    <li><span><strong>Send Complaints</strong></span> Quickly send your complaints to
                                        barangay officials.</li>
                                    <li><span><strong>Stay Updated</strong></span> Receive the latest announcements, news,
                                        and updates from the barangay.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center">
                            <img src="images/Checklist.png" alt="">
                        </div>
                    </div>
                    <div class="about-officials">
                        <div>
                            <img src="/images/Team Meeting 1.png" alt="">
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <h1>Barangay Officials</h1>
                            <ul>
                                <li><span><strong>Efficient Resident Management</strong></span> Keep track of resident information
                                    and their requests in a centralized database.</li>
                                <li><span><strong>Streamlined Document Management</strong></span> Manage all document requests and
                                    issuance digitally to save time and resources.</li>
                                <li><span><strong>Enhanced Communication</strong></span> Easily communicate with residents and keep
                                    them informed through announcements</li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        Here’s an improved version with a bit more emphasis and refinement:
                        
                        eBarrio is committed to transforming how barangays function by embedding modern technology into everyday governance. We believe that with the right digital tools, barangays can become more responsive, efficient, and transparent, ultimately enhancing the quality of service to residents.
                        
                        <br>Our mission is to build a stronger, more connected community. We envision a barangay where technology bridges the gap between officials and residents, ensuring communication is seamless, information is readily accessible, and every resident feels empowered to actively engage in local governance.
                        
                        <br>Together, we can reshape our barangay into a model of efficiency and inclusivity—a testament to how technology can positively impact our lives. Join us on this journey to elevate barangay governance, one digital step at a time.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
