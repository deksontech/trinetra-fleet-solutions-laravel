<p>
    @if($audience === 'admin')
        A new enquiry has been received.
    @else
        Thank you for contacting Trinetra Fleet Solutions. Your enquiry has been received.
    @endif
</p>
<p><strong>Reference:</strong> {{ $lead->enquiry_number }}</p>
<p><strong>Name:</strong> {{ $lead->customer_name }}</p>
<p><strong>Service:</strong> {{ $lead->service }}</p>
<p><strong>Route:</strong> {{ $lead->pickup_location }} to {{ $lead->destination }}</p>
<p><strong>Phone:</strong> {{ $lead->phone }}</p>
<p><strong>Email:</strong> {{ $lead->email }}</p>
