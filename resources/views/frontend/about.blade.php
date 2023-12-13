@extends('layouts.frontend')
@section('title','About')
@section('content')
@include('includes.banner',['title'=>'About','details'=>''])
<!--== Committee Page Content Start ==-->
<section id="page-content-wrap">
    <div class="about-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 m-auto">
                    <!-- Single about text start -->
                    <div class="single-about-text">
                        <span class="year">2023</span>
                        <img src="{{asset('frontend/assets/img/about-bg.jpg')}}"alt="About" class="img-fluid img-left">
                        <h2 class="h3">ESTD of This Alumni Assotitation</h2>
                        <p>The BUP Alumni Association (BUPAA) stands as a testament to the enduring spirit of collaboration and progress, having been founded with a vision to create a strong and connected community of graduates. While the specific establishment date (ESTD) serves as a crucial historical milestone, the shared commitment among visionary individuals to preserve the bonds formed during their university years was the driving force behind the association's inception. From its early days, the BUPAA has been guided by founding principles emphasizing unity, mentorship, and service—a commitment to creating a platform that transcends graduation day.</p>
                        <p>As the association took its initial steps, it underwent a process of evolution and growth. The establishment of foundational structures, the formulation of a clear mission and vision, and the cultivation of a distinct identity among its members marked the early years. Leadership played a pivotal role in steering the BUPAA through challenges and seizing opportunities for expansion. Significant milestones, such as scholarship programs, mentorship initiatives, and collaborative research projects, showcased the association's impact on both alumni and the university.

The BUPAA's influence on academic excellence at BUP became a defining aspect of its journey. Through partnerships with the university, the association contributed to research programs, established endowments, and created opportunities for current students. Annual alumni reunions and various networking events further strengthened the sense of community, becoming integral to the association's identity.
Beyond the university walls, the BUPAA extended its influence to the broader community through philanthropic initiatives. Supporting local charities, organizing community outreach programs, and leveraging the collective skills of its members for societal development demonstrated the association's commitment to being a responsible and contributing citizen.
Like any journey, the BUPAA faced challenges. Economic fluctuations, changing societal dynamics, and the evolving landscape of higher education posed obstacles that required adaptability and resilience. The association's ability to navigate these challenges and emerge stronger spoke volumes about the dedication of its members.</p>
                    </div>
                    <!-- Single about text End -->

                    <!-- Single about text start -->
                    <div class="single-about-text">
                        <span class="year">2023</span>
                        <img src="{{asset('frontend/assets/img/bup.jpg')}}"alt="About" class="img-fluid img-right">
                        <h2 class="h3">Our First Achivement in History</h2>
                        <p>The rich history of the Bangladesh University of Professionals (BUP) is characterized by a commitment to academic distinction and progressive contributions. Among its many milestones, the university's first notable achievement stands as a foundational cornerstone—a testament to BUP's dedication to excellence from its inception.</p>
                        <p>This inaugural achievement could take various forms, such as a groundbreaking discovery, innovative research, or a significant academic milestone. Regardless of the nature of the accomplishment, it played a crucial role in shaping BUP's identity and positioning the institution on the map of academic distinction.

Whether it was a pioneering discovery that pushed the boundaries of knowledge or an academic milestone that garnered recognition, this achievement set the tone for BUP's future endeavors. It exemplified the dedication of the BUP community to pushing the boundaries and striving for excellence in all facets of academic and research pursuits.
The recognition and commendations received as a result of this achievement further underscored its significance. Whether from academic bodies, industry leaders, or governmental institutions, these acknowledgments highlighted the impact of BUP's accomplishment within broader academic and societal contexts.
Beyond the university's borders, the first achievement had implications for the local community, industry, or even on a global scale. Understanding the broader impact contextualizes the achievement within a larger societal framework, emphasizing how BUP's contributions extend far beyond the confines of the campus.
As a pivotal moment in BUP's history, this initial achievement laid the groundwork for subsequent successes. It serves as a catalyst for the university's ongoing commitment to excellence, research, and innovation. The legacy of this accomplishment is evident in BUP's continued pursuit of excellence, showcasing how it has shaped the trajectory of the institution and its enduring impact on the academic landscape.

</p>
                    </div>
                    <!-- Single about text End -->

                    <!-- Single about text start -->
                    <div class="single-about-text">
                        <span class="year">2023</span>
                        <img src="{{asset('frontend/assets/img/about-bg.jpg')}}"alt="About" class="img-fluid img-left">
                        <h2 class="h3">Our New Genaretion</h2>
                        <p>Bearing witness to the perpetual evolution of academia, the Bangladesh University of Professionals (BUP) welcomes a vibrant wave of change embodied by its new generation. Comprising students, faculty, and administrators, this dynamic cohort ushers in a fresh perspective, injecting energy and contemporary outlooks into the institution's academic landscape.
At the heart of this transformation are students characterized by their tech-savvy nature and global awareness. Actively engaged in their educational journey, they leverage cutting-edge technologies and foster a dynamic learning environment. Their commitment to interdisciplinary approaches and social responsibility shapes a holistic educational experience, reflecting the complexity of the modern world.</p>
                        <p>Administrators from the new generation, in leadership roles, prioritize inclusivity, diversity, and sustainability. Their decision-making reflects a commitment to preparing students not only for academic success but also for the realities of a rapidly changing world. Transparent, collaborative, and strategic in their approach, they position BUP as a forward-thinking institution.
The new generation at BUP signifies more than a demographic shift—it embodies a cultural and intellectual evolution. The intergenerational exchange of ideas between seasoned educators and the fresh perspectives of the younger generation creates a vibrant intellectual community. As this cohort continues to shape the university's identity, they become catalysts for innovation, progress, and positive change, ensuring that BUP remains responsive to the needs of the present and prepared for the challenges and opportunities of the future.</p>
                    </div>
                    <!-- Single about text End -->
                </div>
            </div>
        </div>
    </div>

    <!--== FunFact Area Start ==-->
    <!--<section id="funfact-area">-->
    <!--    <div class="container-fluid">-->
    <!--        <div class="row text-center">-->
                <!--== Single FunFact Start ==-->
    <!--            <div class="col-lg-3 col-sm-6">-->
    <!--                <div class="single-funfact-wrap">-->
    <!--                    <div class="funfact-icon">-->
    <!--                        <img src="{{asset('frontend/assets/img/fun-fact/user.svg')}}" alt="Funfact">-->
    <!--                    </div>-->
    <!--                    <div class="funfact-info">-->
    <!--                        <h5 class="funfact-count">4025</h5>-->
    <!--                        <p>Members</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
                <!--== Single FunFact End ==-->

                <!--== Single FunFact Start ==-->
    <!--            <div class="col-lg-3 col-sm-6">-->
    <!--                <div class="single-funfact-wrap">-->
    <!--                    <div class="funfact-icon">-->
    <!--                        <img src="{{asset('frontend/assets/img/fun-fact/picture.svg')}}" alt="Funfact">-->
    <!--                    </div>-->
    <!--                    <div class="funfact-info">-->
    <!--                        <h5 class="funfact-count">8725</h5>-->
    <!--                        <p>Photos</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
                <!--== Single FunFact End ==-->

                <!--== Single FunFact Start ==-->
    <!--            <div class="col-lg-3 col-sm-6">-->
    <!--                <div class="single-funfact-wrap">-->
    <!--                    <div class="funfact-icon">-->
    <!--                        <img src="{{asset('frontend/assets/img/fun-fact/event.svg')}}" alt="Funfact">-->
    <!--                    </div>-->
    <!--                    <div class="funfact-info">-->
    <!--                        <h5><span class="funfact-count">231</span>+</h5>-->
    <!--                        <p>Events</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
                <!--== Single FunFact End ==-->

                <!--== Single FunFact Start ==-->
    <!--            <div class="col-lg-3 col-sm-6">-->
    <!--                <div class="single-funfact-wrap">-->
    <!--                    <div class="funfact-icon">-->
    <!--                        <img src="{{asset('frontend/assets/img/fun-fact/medal.svg')}}" alt="Funfact">-->
    <!--                    </div>-->
    <!--                    <div class="funfact-info">-->
    <!--                        <h5><span class="funfact-count">32</span>+</h5>-->
    <!--                        <p>Awards</p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
                <!--== Single FunFact End ==-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!--== FunFact Area End ==-->



    <div class="people-to-say section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="about-page-area-title">
                        <h2>Some Speech About Us</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="people-to-say-wrapper owl-carousel">
                        <!-- Single People Testimonial -->
                        <div class="single-testimonial-wrap">
                            <div class="people-thumb">
                                <img src="{{asset('frontend/assets/img/testimonial/vc.jpg')}}" alt="Alumni" class="img-fluid" />
                            </div>
                            <i class="quote-icon"></i>
                            <p>BUP is established in a lush green landscape with own unique features located away from busy life of metropolitan city. The university provides a tranquil, pollution free, secured campus life, with uninterrupted congenial academic atmosphere. </p>
                            <h4>Major General Md Mahbub-ul Alam<span class="people-deg">ndc, afwc, psc, Mphil, PhD</span><span class="people-deg">Vice Chancellor</span></h4>
                        </div>
                        <!-- Single People Testimonial -->

                        <!-- Single People Testimonial -->
                        <div class="single-testimonial-wrap">
                            <div class="people-thumb">
                                <img src="{{asset('frontend/assets/img/testimonial/dean.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <i class="quote-icon"></i>
                            <p>BUP welcomes students who will dedicate their attention and devotion to serious academic pursuit to build up better tomorrow for the nation. We are committed to providing high quality education in attaining meaningful benefits for the students.</p>
                            <h4>Brig Gen Mohammed Monir Hossain Patwary<span class="people-deg">    psc, Dean - FBS</span></h4>
                        </div>
                        <!-- Single People Testimonial -->

                        <!-- Single People Testimonial -->
                        <div class="single-testimonial-wrap">
                            <div class="people-thumb">
                                <img src="{{asset('frontend/assets/img/testimonial/avatar.jpg')}}" alt="" class="img-fluid" />
                            </div>
                            <i class="quote-icon"></i>
                            <p>BUP is steadfast in its mission to provide high-quality education, empowering students with the knowledge and capabilities that will shape their future and positively impact our nation.</p>
                            <h4>Major Masudur Rashid<span class="people-deg">ndc, Deputy Director Alumni</span></h4>
                        </div>
                        <!-- Single People Testimonial -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Committee Page Content End ==-->
@endsection
