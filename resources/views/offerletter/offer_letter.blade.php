<!-- resources/views/offerletter/offer_letter.blade.php -->
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Offer Letter</h2>

        <p>Dear {{ $full_name }},</p>

        <p>Congratulations! We are pleased to extend an offer for the position of {{ $position }} at our company.</p>

        <p>Below is the offer letter content:</p>

        <div class="mt-4">
            <p>{{ $letter_content }}</p>
        </div>

        <p>Please find the attached offer letter in PDF format: <a href="{{ $offer_letter_pdf_url }}">Download Offer Letter</a></p>

        <p>If you have any questions or concerns, feel free to contact us at {{ $company_email }}.</p>

        <p>Best regards,</p>
        <p>Your Company Name</p>
    </div>
</section>