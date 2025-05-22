<!-- resources/views/recipes/partials/review-form.blade.php -->
<form action="{{ url('/recipes/' . $recipe->id . '/reviews') }}" method="POST">
    @csrf
    <label for="rating">Rating:</label>
    <select name="rating" required>
        @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
        @endfor
    </select>

    <textarea name="comment" placeholder="Leave a comment..."></textarea>

    <button type="submit">Submit Review</button>
</form>
