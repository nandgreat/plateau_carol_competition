<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Participant Profile - {{ $participant->fullname }}</title>
    <style>
        /* Reset everything to zero margins and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            line-height: 1.2;
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #1f2937;
            background: #ffffff;
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
        }
        
        /* Page container - absolutely no margins */
        .page {
            width: 100%;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        
        /* Header - starts at absolute top */
        .header {
            background: linear-gradient(135deg, #065f46 0%, #047857 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        
        .header-content h1 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 2px;
        }
        
        .header-content p {
            opacity: 0.9;
            font-size: 11px;
        }
        
        .logo {
            font-size: 24px;
            opacity: 0.9;
        }
        
        /* Main Content - minimal padding */
        .main-content {
            padding: 10px 15px 0 15px;
        }
        
        .timestamp {
            text-align: right;
            font-size: 9px;
            color: #9ca3af;
            margin-bottom: 8px;
        }
        
        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            overflow: hidden;
        }
        
        /* Left Column */
        .left-column {
            background: #f8fafc;
            padding: 15px;
            border-right: 1px solid #e5e7eb;
        }
        
        /* Profile Section */
        .profile {
            text-align: center;
            margin-bottom: 15px;
        }
        
        .profile-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #10b981;
            margin: 0 auto 10px;
        }
        
        .profile-name {
            font-size: 16px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 3px;
        }
        
        .profile-code {
            color: #065f46;
            font-weight: 600;
            font-size: 11px;
            margin-bottom: 6px;
        }
        
        .badges {
            display: flex;
            justify-content: center;
            gap: 5px;
            flex-wrap: wrap;
        }
        
        .badge {
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 9px;
            font-weight: 500;
        }
        
        .badge.age {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .badge.gender {
            background: #fce7f3;
            color: #be185d;
        }
        
        /* Contact Info */
        .contact-info {
            background: white;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }
        
        .section-title {
            color: #065f46;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .contact-item {
            margin-bottom: 8px;
        }
        
        .contact-label {
            font-size: 9px;
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 1px;
        }
        
        .contact-value {
            font-size: 11px;
            color: #1f2937;
            font-weight: 500;
        }
        
        /* Right Column */
        .right-column {
            padding: 15px;
            background: white;
        }
        
        /* Personal Info */
        .personal-info {
            margin-bottom: 12px;
        }
        
        .info-grid {
            display: grid;
            gap: 8px;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 6px;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .info-label {
            font-size: 10px;
            color: #6b7280;
            font-weight: 500;
        }
        
        .info-value {
            font-size: 11px;
            color: #1f2937;
            font-weight: 600;
            text-align: right;
        }
        
        /* Documents Section */
        .documents {
            margin-bottom: 12px;
        }
        
        .documents-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6px;
        }
        
        .document-item {
            background: #f8fafc;
            padding: 8px;
            border-radius: 4px;
            text-align: center;
            border: 1px solid #e5e7eb;
        }
        
        .document-label {
            font-size: 9px;
            color: #6b7280;
            margin-bottom: 3px;
            font-weight: 500;
        }
        
        .document-status {
            font-size: 10px;
            font-weight: 600;
        }
        
        .status-uploaded {
            color: #10b981;
        }
        
        .status-missing {
            color: #ef4444;
        }
        
        /* QR Code */
        .qr-section {
            text-align: center;
            padding: 10px;
            background: #f8fafc;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }
        
        .qr-image {
            width: 90px;
            height: 90px;
            margin: 0 auto 4px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }
        
        .qr-label {
            font-size: 9px;
            color: #6b7280;
            font-weight: 500;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 12px;
            color: #6b7280;
            font-size: 9px;
            border-top: 1px solid #e5e7eb;
            margin-top: 10px;
        }
        
        /* Print styles - absolutely no margins */
        @page {
            margin: 0;
            padding: 0;
        }
        
        @media print {
            body {
                margin: 0 !important;
                padding: 0 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .page {
                margin: 0 !important;
                padding: 0 !important;
            }
            
            .header {
                background: #065f46 !important;
                margin: 0 !important;
                padding: 15px 20px !important;
            }
            
            .main-content {
                padding: 10px 15px 0 15px !important;
            }
        }
    </style>
</head>
<body>
    <!-- Page starts at absolute top -->
    <div class="page">
        <!-- Header - no top margin -->
        <div class="header">
            <div class="header-content">
                <h1>Participant Profile</h1>
                <p>Plateau Carol Event • Official Registration Document</p>
            </div>
            <div class="logo">🎄</div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="timestamp">
                Generated: {{ now()->format('M j, Y g:i A') }}
            </div>
            
            <div class="content-grid">
                <!-- Left Column -->
                <div class="left-column">
                    <div class="profile">
                        <img src="{{ $participant->child_image_path ? storage_path('app/public/' . $participant->child_image_path) : 'https://ui-avatars.com/api/?name=' . urlencode($participant->fullname) . '&background=random&size=80' }}" 
                             class="profile-image" 
                             alt="Participant Photo">
                        <div class="profile-name">{{ $participant->fullname }}</div>
                        <div class="profile-code">ID: {{ $participant->unique_code }}</div>
                        <div class="badges">
                            <span class="badge age">{{ $participant->age }} years</span>
                            <span class="badge gender">{{ $participant->gender }}</span>
                        </div>
                    </div>
                    
                    <div class="contact-info">
                        <div class="section-title">
                            Parent/Guardian
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-label">Full Name</div>
                            <div class="contact-value">{{ $participant->parent_name ?? 'Not provided' }}</div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-label">Phone Number</div>
                            <div class="contact-value">{{ $participant->parent_phone ?? 'Not provided' }}</div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-label">Email Address</div>
                            <div class="contact-value">{{ $participant->parent_email ?? 'Not provided' }}</div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-label">Local Government</div>
                            <div class="contact-value">{{ $participant->lga ?? 'Not specified' }}</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="right-column">
                    <div class="personal-info">
                        <div class="section-title">
                            <span>📋</span>
                            Personal Information
                        </div>
                        
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Full Name</span>
                                <span class="info-value">{{ $participant->fullname }}</span>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-label">Age</span>
                                <span class="info-value">{{ $participant->age }} years old</span>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-label">Gender</span>
                                <span class="info-value">{{ $participant->gender }}</span>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-label">Organization</span>
                                <span class="info-value">{{ $participant->organization ?? 'Not specified' }}</span>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-label">Interest Area</span>
                                <span class="info-value">{{ $participant->interest_area ?? 'Not specified' }}</span>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-label">Registration Date</span>
                                <span class="info-value">{{ $participant->created_at->format('M j, Y') }}</span>
                            </div>
                        </div>
                    </div>
                
                
                </div>
            </div>
            
            <div class="footer">
                <p>Official Document • Plateau Carol Event Management System</p>
                <p>Document ID: {{ $participant->unique_code }}-{{ now()->format('YmdHis') }}</p>
            </div>
        </div>
    </div>
</body>
</html>