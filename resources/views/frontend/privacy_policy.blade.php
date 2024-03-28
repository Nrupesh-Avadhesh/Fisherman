@extends('frontend.layouts.app')
@section('title', ' / privacy-policy')
@section('description', '')
@section('keywords', '')
@section('header_link')
@endsection
@section('content')
    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area breadcrumb-space theme-bg-1 valign p-relative z-index-11 fix">
        <div class="breadcrumb__glow">
            <div class="glow-1"></div>
            <div class="glow-2"></div>
        </div>
        <div class="round__shape">
            <img src="{{ asset('frontend/assets/imgs/shapes/cercle.png') }}" alt="image not found">
        </div>
        <div class="container">
            <div class="row gy-50 align-items-center justify-content-between">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="breadcrumb__title-wraper">
                        <span class="section__subtitle-7 mb-20">PRIVACY & POLICY</span>
                        <h2 class="breadcrumb__title">Safeguarding <span class="gradient-text-3">Your Data </span> of and
                            Experience</h2>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6">
                    <div class="breadcrumb__description">
                        <!--<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit.</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- Policy privacy area start -->
    <section class="Policy-privacy__area section-space ">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab__privacy-policy" role="tabpanel">
                            <div class="terms__conditions-content">
                                <div class="privacy__item">
                                    <h2 class="section__title mb-30">Privacy Policy Agreement</h2>
                                    <p>
                                        This “Privacy Notice” describes the practices of the Fisherman Group entity
                                        identified below
                                        and its respective subsidiaries and affiliates Fisherman Group and the rights and
                                        choices available to individuals, regarding personal
                                        data. These Fisherman Group entities are members of the Fiserv group of companies.
                                        Personal
                                        data means any information that identifies or can reasonably be linked with an
                                        identifiable individual.
                                    </p>

                                </div>
                                <div class="privacy__item">
                                    <ul class="icon__list">
                                        <li>
                                            <span class="list_item_icon">
                                                <i class="fas fa-circle"></i>
                                            </span>
                                            <span class="list__item-text">If your country of residence is the UK or an EU
                                                Member State then your Fisherman Group entity is Marketplace Merchant
                                                Solutions Limited, trading as Fisherman Group ™
                                            </span>
                                        </li>
                                        <li>
                                            <span class="list_item_icon">
                                                <i class="fas fa-circle"></i>
                                            </span>
                                            <span class="list__item-text">In any other country in which Fisherman Group
                                                operates your Fisherman Group entity is Fisherman Group Network, LLC.</span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="privacy__item">
                                    <p>
                                        Fisherman Group may provide additional or supplemental privacy notices to
                                        individuals at the
                                        time we collect their data, which will govern how we may process the information
                                        provided at that time. We may alter this Privacy Notice as needed to abide by local
                                        laws or regulations around the world, such as by providing supplemental information
                                        in certain countries. This Privacy Notice does not apply to Fisherman Group’s
                                        processing of
                                        the personal data of its personnel, such as employees and contractors.
                                    </p>
                                    <p>
                                        We provide important information here for individuals located within Member States
                                        of the European Union, countries in the European Economic Area, the United Kingdom,
                                        and Switzerland.
                                    </p>
                                </div>
                                <div class="privacy__item" style=" margin-bottom: -75px;">
                                    <h3 class="info__title">Table of Contents</h3>
                                    <ul class="icon__list">
                                        <li>
                                            <a href="#The-personal-data-we-collect" class="link">
                                                <span class="list__item-text">
                                                    The personal data we collect
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#How-we-use-your-personal-data"class="link">
                                                <span class="list__item-text">
                                                    How we use your personal data
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#The-parties-with-whom-we-share-your-personal-data" class="link">
                                                <span class="list__item-text">
                                                    The parties with whom we share your personal data
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Your-rights-and-choices" class="link">
                                                <span class="list__item-text">
                                                    Your rights and choices
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#International-transfers" class="link">
                                                <span class="list__item-text">
                                                    International transfers
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#How-we-keep-your-data-safe" class="link">
                                                <span class="list__item-text">
                                                    How we keep your data safe
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#Links-to-other-websites" class="link">
                                                <span class="list__item-text">
                                                    Links to other websites
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#How-long-will-you-use-my-personal-data" class="link">
                                                <span class="list__item-text">
                                                    How long will you use my personal data
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                                <!--The personal data we collect START HERE-->
                                <div class="privacy__item" id="The-personal-data-we-collect"
                                    style="padding-top: 100px; margin-bottom: -100px;">
                                    <div class="privacy__item">
                                        <h3 class="info__title">The personal data we collect</h3>
                                        <p>
                                            We collect personal data about individuals from various sources described below.
                                            Where applicable, we indicate whether and why individuals must provide us with
                                            personal data, as well as the consequences of failing to do so.
                                        </p>
                                        <p>
                                            Information that we collect when a merchant’s customer interacts with a
                                            Fisherman Group or other Fisherman Group payment method
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Information that we collect when
                                                        individuals make a payment</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p> When you make a payment at a merchant using a Fisherman Group Point of Sale
                                            system
                                            (“Fisherman Group ”), the Fisherman Group Payment Gateway, the Fisherman
                                            Group App, the Fisherman Group Go App,
                                            or any other related payment method that Fisherman Group makes available, we
                                            collect
                                            information about the transaction, which may include personal data. Information
                                            about transactions includes the payment card used, name associated with the
                                            payment card, electronic signature, name and location of the merchant at which
                                            the transaction occurred, date and time of the transaction, transaction amount,
                                            and information about the goods or services purchased in the transaction.
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Additional information merchants’
                                                        customers may provide through the Fisherman Group </strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p>We may collect additional information, depending on how a merchant configures its
                                            Fisherman Group . This information may include:</p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text">Your email address or phone number, for
                                                    example, if you choose to receive an electronic receipt or opt-in to
                                                    receive marketing communications
                                                </span>
                                            </li>
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text">Your marketing preferences, such as whether
                                                    you wish to receive marketing communications or newsletters
                                                </span>
                                            </li>
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text">Information about your participation in a
                                                    merchant’s loyalty program, if offered and if you choose to participate
                                                </span>
                                            </li>
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text">Other information you choose to enter into the
                                                    Fisherman Group , such as your birthdate, interests or preferences,
                                                    reviews,
                                                    and feedback.
                                                </span>
                                            </li>
                                        </ul>
                                        <p></p>
                                    </div>
                                </div>
                                <!--The personal data we collect END HERE-->

                                <!--How we use your personal data START HERE-->
                                <div class="privacy__item" id="How-we-use-your-personal-data"
                                    style="padding-top: 100px; margin-bottom: -100px;">
                                    <div class="privacy__item">
                                        <h3 class="info__title">How we use your personal data</h3>
                                        <p>
                                            We use your personal data for the purposes of:
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Providing our products and
                                                        services, which includes</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p> Operating, evaluating, maintaining, improving, and providing the features and
                                            functionality of our products and services Fulfilling a payment or return
                                            transaction initiated by you Delivering electronic receipts to consumers who
                                            request them via email or text message Managing our relationship with you or
                                            your
                                            company Carrying out our obligations, and exercising our rights,
                                            under our agreement with you or your company
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>For research and
                                                        development</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p> We use the information we collect for our own research and development purposes,
                                            which include:
                                        </p>
                                        <p> Developing or improving our products and services Developing and creating
                                            analytics and related reporting, such as regarding industry and fraud trends.
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Marketing </strong>
                                                </span>

                                            </li>
                                        </ul>
                                        <p> We may use your personal data to form a view on what products or services we
                                            think you may want or need, or what may be of interest to you.
                                        </p>
                                        <p> We may present opportunities when you use a Fisherman Group POS to provide your
                                            personal
                                            data to Fisherman Group and merchants to facilitate marketing communications
                                            between you
                                            and the merchant, and we will send such marketing communication if you agree to
                                            receive them.
                                        </p>
                                        <p> We may contact merchants and merchant’s personnel with marketing communications
                                            using the personal data that the merchant provided to us if the merchant
                                            actively expresses interest in making a purchase of Fisherman Group products or
                                            services
                                            or have made a purchase from us and, in any case, have not opted out of
                                            receiving that marketing, to the extent permitted by applicable law.
                                        </p>

                                    </div>
                                </div>
                                <!--How we use your personal data END HERE-->

                                <!--The parties with whom we share your personal data START HERE-->
                                <div class="privacy__item" id="The-parties-with-whom-we-share-your-personal-data"
                                    style="padding-top: 100px; margin-bottom: -100px;">
                                    <div class="privacy__item">
                                        <h3 class="info__title">The parties with whom we share your personal data</h3>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Companies within the Fisherman
                                                        group</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p> We may disclose your personal data to our subsidiaries and corporate
                                            affiliates – including those in the Fisherman group of companies – for
                                            purposes consistent with this Privacy Notice.
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Service providers</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p> We employ third party companies and individuals to administer and provide
                                            services on our behalf (such as companies that provide customer support,
                                            companies that we engage to host, manage, maintain, and develop our website,
                                            mobile applications, and IT systems, companies that help us process payments,
                                            companies that assist with food delivery on behalf of our Merchants, and
                                            companies that help us analyze your usage of our services for product
                                            improvement purposes).
                                        </p>
                                        <p> These third parties may use your information only as
                                            directed by Fisherman Group in a manner consistent with this Privacy Notice and
                                            are
                                            prohibited from using or disclosing your information for any other purpose.
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Merchants and Applications that
                                                        run on the Fisherman Group POS Used by Merchants</strong>
                                                </span>

                                            </li>
                                        </ul>
                                        <p> When Fisherman Group performs services for merchants, it may share personal data
                                            with
                                            those merchants. For example, Fisherman Group may collect information about a
                                            merchant’s
                                            customers from or on behalf of the merchant, such as when Fisherman Group
                                            processes
                                            payment transactions, and Fisherman Group may provide personal data about those
                                            customers
                                            back to the merchant.
                                        </p>
                                        <p> Third-party applications that a merchant has installed on a Fisherman Group POS
                                            may be
                                            capable of providing instructions to Fisherman Group to engage in a transfer of
                                            personal
                                            data, similar to how a merchant could provide such directions. For example, an
                                            application may direct Fisherman Group to export data or reports to a
                                            third-party cloud
                                            storage system.
                                        </p>
                                        <p> Merchants are responsible for their use of third-party
                                            applications, the directions that the application provides to Fisherman Group,
                                            and
                                            Fisherman Group’s reliance on those directions. Fisherman Group is not
                                            responsible for the privacy
                                            policy or practices of any third-party application.
                                        </p>

                                    </div>
                                </div>
                                <!--The parties with whom we share your personal data END HERE-->

                                <!--Your rights and choices START HERE-->
                                <div class="privacy__item" id="Your-rights-and-choices"
                                    style="padding-top: 100px; margin-bottom: -100px;">
                                    <div class="privacy__item">
                                        <h3 class="info__title">Your rights and choices</h3>
                                        <p>
                                            In this section, we describe the rights and choices available to all users.
                                            Users subject to additional jurisdiction-specific disclosures may read
                                            additional information about their rights below.
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Marketing communications</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p> You can ask us to stop sending you marketing messages at any time by contacting
                                            us or clicking on the opt-out link included in each marketing message. You may
                                            continue to receive service-related and other non-marketing messages. You may
                                            unsubscribe from a specific merchants’ communications sent to you via Fisherman
                                            Group’s
                                            technology by clicking “Unfollow” (or a similarly-titled opt-out link).
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Targeted online
                                                        advertising</strong>
                                                </span>
                                            </li>
                                        </ul>
                                        <p> Some of the business partners that collect information about users’ activities
                                            on our websites or in our mobile applications may be members of organizations or
                                            programs that provide choices to individuals regarding the use of their browsing
                                            behavior or mobile application usage for purposes of targeted advertising.
                                        </p>
                                        <ul class="icon__list">
                                            <li>
                                                <span class="list_item_icon">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="list__item-text"><strong>Choosing not to provide your
                                                        personal data</strong>
                                                </span>

                                            </li>
                                        </ul>
                                        <p> Where we request personal data directly from you, you do not have to provide it
                                            to us.
                                        </p>
                                        <p> If you decide not to provide the requested information, in some
                                            circumstances we, or merchants who use Fisherman Group, may be unable to provide
                                            products or services to you. For example, we may be unable to process your
                                            transaction.
                                        </p>

                                    </div>
                                </div>
                                <!--Your rights and choices END HERE-->

                                <!--International transfers START HERE-->
                                <div class="privacy__item" id="International-transfers"
                                    style="padding-top: 100px; margin-bottom: -100px;">
                                    <div class="privacy__item">
                                        <h3 class="info__title">International transfers</h3>
                                        <p>
                                            Fisherman Group is headquartered in the United States, and it maintains offices
                                            and has service providers in other countries, such as the countries listed here.

                                        </p>
                                        <p>
                                            Your personal data may be transferred to the United States or other locations
                                            outside of your state, province, country or other governmental jurisdiction
                                            where we or our service providers maintain offices and where privacy laws may
                                            not be as protective as those in your jurisdiction.
                                        </p>
                                        <p>
                                            If we make such a transfer, we will require that the recipients of your personal
                                            data provide data security
                                            and protection in accordance with applicable law.
                                        </p>
                                        <p>
                                            European users should read the important information provided here about
                                            transfer of personal data outside of Europe.
                                        </p>

                                    </div>
                                </div>
                                <!--International transfers END HERE-->

                                <!--How we keep your data safe START HERE-->
                                <div class="privacy__item" id="How-we-keep-your-data-safe"
                                    style="padding-top: 100px; margin-bottom: -100px;">
                                    <div class="privacy__item">
                                        <h3 class="info__title">How we keep your data safe</h3>
                                        <p> We have put in place appropriate security measures to prevent your personal data
                                            from being accidentally lost, used or accessed in an unauthorized way, altered
                                            or disclosed. In addition, we limit access to your personal data to those
                                            employees, agents, contractors and other third parties who have a business need
                                            to know. They will only process your personal data on our instructions and they
                                            are subject to a duty of confidentiality.
                                        </p>
                                        <p> We maintain annual compliance with global Payment Card Industry Data Security
                                            Standard (PCI DSS) adopted by the payment card brands for all companies that
                                            process, store or transmit cardholder data.
                                        </p>
                                        <p> We have put in place procedures to deal with any suspected personal data breach
                                            and will notify you and any applicable regulator of a breach where we are
                                            legally required to do so.
                                        </p>

                                    </div>
                                </div>
                                <!--How we keep your data safe END HERE-->

                                <!--Links to other websites START HERE-->
                                <div class="privacy__item" id="Links-to-other-websites"
                                    style="padding-top: 100px; margin-bottom: -100px;">
                                    <div class="privacy__item">
                                        <h3 class="info__title">Links to other websites</h3>
                                        <p> We may link to third-party websites, mobile applications, and other content.
                                            Fisherman Group is not responsible for the privacy practices of any third party,
                                            and this privacy notice does not apply to such third party’s websites, mobile
                                            applications, or other content.
                                        </p>
                                        <p> Fisherman Group does not guarantee, approve, or endorse any information,
                                            material, services, or products contained on or available through any linked
                                            third-party website, mobile application, or other content.
                                        </p>
                                        <p> Fisherman Group is not responsible for any content on third-party properties to
                                            which we link. Fisherman Group provides links to third-party properties or
                                            content as a convenience, and visiting or using linked third-party properties or
                                            content is at your own risk.
                                        </p>

                                    </div>
                                </div>
                                <!--Links to other websites END HERE-->

                                <!--How long will you use my personal data START HERE-->
                                <div class="privacy__item" id="How-long-will-you-use-my-personal-data"
                                    style="padding-top: 100px; ">
                                    <div class="privacy__item">
                                        <h3 class="info__title">How long will you use my personal data</h3>
                                        <p> We will use your personal data for as long as necessary based on why we
                                            collected it and what we use it for. This may include our need to satisfy a
                                            legal, regulatory, accounting, or reporting requirement.
                                        </p>
                                        <p> To determine the appropriate retention period for personal data, we consider the
                                            amount, nature, and sensitivity of the personal data, the potential risk of harm
                                            from unauthorized use or disclosure of your personal data, the purposes for
                                            which we process your personal data and whether we can achieve those purposes
                                            through other means, and the applicable legal requirements.
                                        </p>
                                        <p> In general terms, we will retain your personal data for as long as is necessary
                                            for the purposes identified in this Privacy Notice, including to provide our
                                            Services, to comply with legal obligations, to enforce and prevent violations of
                                            our Terms, to protect against fraudulent activity, and to defend our legal
                                            rights, property and users.
                                        </p>

                                    </div>
                                </div>
                                <!--How long will you use my personal data END HERE-->


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Policy privacy area end -->
@endsection
@section('footer_script')

@endsection
