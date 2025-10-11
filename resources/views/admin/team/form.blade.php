<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $member->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="Ongoing" {{ old('status', $member->status ?? '') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
        <option value="Completed" {{ old('status', $member->status ?? '') == 'Completed' ? 'selected' : '' }}>Completed</option>
    </select>
</div>

<div class="mb-3">
    <label>Thesis Title</label>
    <input type="text" name="thesis_title" class="form-control" value="{{ old('thesis_title', $member->thesis_title ?? '') }}">
</div>

<div class="mb-3">
    <label>Area of Research</label>
    <input type="text" name="area_of_research" class="form-control" value="{{ old('area_of_research', $member->area_of_research ?? '') }}">
</div>

<div class="mb-3">
    <label>Photo</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($member->image))
        <img src="{{ asset('storage/' . $member->image) }}" width="100" class="mt-2 rounded">
    @endif
</div>
