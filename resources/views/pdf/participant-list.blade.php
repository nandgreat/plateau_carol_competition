<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Participants List - Plateau Carol Event</title>
    <style>
        /* Reset everything */
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
            padding: 10px;
            font-size: 10px;
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #065f46 0%, #047857 100%);
            color: white;
            padding: 15px 20px;
            text-align: center;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        
        .header h1 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .header p {
            opacity: 0.9;
            font-size: 12px;
        }
        
        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .stat-card {
            background: #f8fafc;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            text-align: center;
        }
        
        .stat-number {
            font-size: 16px;
            font-weight: 700;
            color: #065f46;
            margin-bottom: 3px;
        }
        
        .stat-label {
            font-size: 9px;
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
        }
        
        /* Table */
        .table-container {
            margin-top: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8px;
        }
        
        th {
            background: #065f46;
            color: white;
            padding: 8px 6px;
            text-align: left;
            font-weight: 600;
            border: 1px solid #064e3b;
        }
        
        td {
            padding: 6px;
            border: 1px solid #e5e7eb;
            vertical-align: top;
        }
        
        tr:nth-child(even) {
            background: #f8fafc;
        }
        
        .participant-name {
            font-weight: 600;
            color: #1f2937;
        }
        
        .participant-code {
            font-size: 7px;
            color: #6b7280;
            margin-top: 1px;
        }
        
        .badge {
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 7px;
            font-weight: 500;
            display: inline-block;
        }
        
        .badge-age {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .badge-male {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .badge-female {
            background: #fce7f3;
            color: #be185d;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 15px;
            color: #6b7280;
            font-size: 8px;
            border-top: 1px solid #e5e7eb;
            margin-top: 15px;
        }
        
        .timestamp {
            text-align: right;
            font-size: 7px;
            color: #9ca3af;
            margin-bottom: 5px;
        }
        
        /* Print styles */
        @page {
            margin: 0;
        }
        
        @media print {
            body {
                margin: 0;
                padding: 10px;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .header {
                background: #065f46 !important;
            }
            
            th {
                background: #065f46 !important;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>Participants List</h1>
        <p>Plateau Carol Event • Complete Registration Records</p>
    </div>
    
    <!-- Timestamp -->
    <div class="timestamp">
        Generated: {{ now()->format('M j, Y g:i A') }}
    </div>

    
    <!-- Participants Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th width="15%">Participant</th>
                    <th width="8%">Age</th>
                    <th width="10%">Gender</th>
                    <th width="15%">Organization</th>
                    <th width="17%">Parent/Guardian</th>
                    <th width="12%">Contact</th>
                    <th width="13%">LGA</th>
                    <th width="10%">Interest Area</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participants as $participant)
                <tr>
                    <td>
                        <div class="participant-name">{{ $participant->fullname }}</div>
                        <div class="participant-code">{{ $participant->unique_code }}</div>
                    </td>
                    <td>
                        <span class="badge badge-age">{{ $participant->age }} years</span>
                    </td>
                    <td>
                        <span class="badge {{ $participant->gender == 'Male' ? 'badge-male' : 'badge-female' }}">
                            {{ $participant->gender }}
                        </span>
                    </td>
                    <td>{{ $participant->organization ?? 'Not specified' }}</td>
                    <td>
                        <div><strong>{{ $participant->parent_name }}</strong></div>
                        @if($participant->parent_phone)
                        <div style="font-size: 7px; color: #6b7280;">{{ $participant->parent_phone }}</div>
                        @endif
                    </td>
                    <td>
                        @if($participant->parent_email)
                        <div style="font-size: 7px;">{{ $participant->parent_email }}</div>
                        @else
                        <div style="font-size: 7px; color: #9ca3af;">No email</div>
                        @endif
                    </td>
                    <td>{{ $participant->lga ?? 'Not specified' }}</td>
                    <td>{{ $participant->interest_area ?? 'Not specified' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Summary -->
    <div style="margin-top: 10px; padding: 8px; background: #f0fdf4; border-radius: 4px; border: 1px solid #bbf7d0;">
        <strong>Summary:</strong> This document contains {{ $participants->count() }} registered participants for Plateau Carol Event. 
        Generated for administrative purposes on {{ now()->format('F j, Y') }}.
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <p>Official Document • Plateau Carol Event Management System</p>
        <p>Document ID: PL-CAROL-PARTICIPANTS-{{ now()->format('YmdHis') }}</p>
        <p>Page 1 of 1 • Confidential</p>
    </div>
</body>
</html>