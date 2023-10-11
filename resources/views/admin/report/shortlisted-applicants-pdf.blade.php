<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 1px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 2px;
            padding-bottom: 2px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        #footer {
            bottom: 0;
            border-top: 0.1pt solid #aaa;
        }

        .page-number:before {
            content: "Page " counter(page);
        }
    </style>
</head>

<body>






    <h4 align="center"> Recommended List for {{ $department->department_name }}
        {{ config('services.admission.academic_session') }} Academic Session
    </h4>

    <table id="customers">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Full Name</th>
            <th scope="col">Phone Number</th>


        </tr>
        <tbody>

            @foreach ($shortlistedApplicants as $index => $applicant)
                <tr>
                    <td style="width: 3%">{{ $index + 1 }}</td>
                    <td style="width: 10%">
                        {{ $applicant->surname . ' ' . $applicant->firstname . ' ' . $applicant->m_name }}</td>

                    @if ($course->count() > 1)
                        <td>{{ $applicant->course_name }}</td>
                    @endif
                    <td>{{ $applicant->p_number }}</td>




                </tr>
            @endforeach


        </tbody>



    </table>
    <h5>HOD Sign:...............</h5>
    <script type="text/php">
        if (isset($pdf)) {
            $text = "page {PAGE_NUM} / {PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("Verdana");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width) / 2;
            $y = $pdf->get_height() - 35;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script>
</body>


</html>
