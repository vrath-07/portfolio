<div class="mb-3">
    <label class="form-label">Project Title</label>
    <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" rows="4" class="form-control">{{ old('description', $project->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Technologies (comma-separated)</label>
    <input type="text" name="technologies" value="{{ old('technologies', $project->technologies ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Year</label>
    <input type="text" name="year" value="{{ old('year', $project->year ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Project Link</label>
    <input type="url" name="link" value="{{ old('link', $project->link ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($project->image))
        <img src="{{ asset('storage/'.$project->image) }}" alt="Project Image" class="mt-2 rounded" width="150">
    @endif
</div>

<button type="submit" class="btn btn-success">{{ $button }}</button>
<a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
